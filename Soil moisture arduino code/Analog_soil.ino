#include <ESP8266WiFi.h> //Fungsi penggunaan nodemcu ESP8266
 
const char* ssid     = "Infinix"; //Nama wifi
const char* password = "12306878"; //Password
const char* host = "192.168.43.65"; //IP PC
 
#define pinSensor A0 //Pin input Analog
int sensorValue = 0; //Nilai sensor analog
 
float moisture = 0; //Nilai kelembapan dalam persentase
 
void setup() {
  Serial.begin(115200); //Set baud rate menjadi 115200
  delay(10); //Untuk mendelay selama 10 ms
 
  Serial.println(); //Menampilkan pada serial monitor
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);//menampilkan nama ssid(Wifi) pada serial monitor
 
  WiFi.begin(ssid, password); //Connecting pada wifi
 
  while (WiFi.status() != WL_CONNECTED) { //Memberi tanda '.' saat masih proses connecting wifi
    delay(500);//untuk mendelay selama 500 ms
    Serial.print(".");
  }
 
  Serial.println("");
  Serial.println("WiFi connected");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());//Menampilkan IP PC 
}
 
void loop() {
  sensorValue = analogRead(pinSensor);//Membaca nilai analog sensor
  sensorValue = constrain(sensorValue, 485, 1023);//Membuat supaya nilai sensorValue menjadi diantara nilai 485-1023
  moisture= map(sensorValue, 485, 1023, 100, 0);//membuat perbandingan antara 485-1023 menjadi 0-100%
  Serial.println(moisture);//Menampilkan Nilai kelembapan dalam persentase
  Serial.print("connecting to ");
  Serial.println(host);//Menampilkan IP PC 
 
  WiFiClient client;//Membuat Klien untuk bisa connect ke IP dan port yang diinisialisasi pada "klien".connect
  const int httpPort = 80;//Port yang digunakan pada "klien".connect
  if (!client.connect(host, httpPort)) {//Jika gagal connect pada host dan httpport maka akan menampilkan "conncection failed"
    Serial.println("connection failed");
    return;
  }
 
  // We now create a URI for the request
  String url = "/esp8266/add.php?"; //Tempat coding add.php 
  url += "moisture=";//Nama kolom pada tabel yang ingin diisi 
  url += moisture;//Menambahkan nilai moisture pada tabel
 
  Serial.print("Requesting URL: ");
  Serial.println(url);//Menampilkan url
 
  // This will send the request to the server
  client.print(String("GET ") + url + " HTTP/1.1\r\n" + 
               "Host: " + host + "\r\n" +
               "Connection: close\r\n\r\n"); //mengirim data sesuai pada url
 
  unsigned long timeout = millis();//untuk menjalankan waktu internal setiap milli seconds pada Arduino secara independent
  while (client.available() == 0) {//client timeout apabila nilai millis-timeout kebih besar dari 5000
    if (millis() - timeout > 5000) {
      Serial.println(">>> Client Timeout !");
      client.stop();
      return;
    }
  }
 
  // Read all the lines of the reply from server and print them to Serial
  while (client.available()) {
    String line = client.readStringUntil('\r');//line adalah reply
     
    if (line.indexOf("sukses gaes") != -1) {
      Serial.println();
      Serial.println("Yes, data masuk");
    }//apabila baris reply dari server index "sukses gaes"tidak sama dengan -1 maka menampilkan"Yes, data masuk"
      else if (line.indexOf("gagal gaes") != -1) {
      Serial.println();
      Serial.println("Maaf, data gagal masuk");
    }
    }//apabila baris reply dari server index "gagal gaes"tidak sama dengan -1 maka menampilkan"maaf, data gagal masuk"
  }
 
  Serial.println();
  Serial.println("closing connection");
  delay(5000);//untuk mendelay selama 5 s
}
