#include <SPI.h>
#include <MFRC522.h>

#include <ESP8266HTTPClient.h>
#include <ESP8266WiFi.h>

const char* ssid = "BenPan";
const char* password = "capsamal3m";

const char* host = "192.168.18.13";
#define LED_PIN 0 //D3
#define SDA_PIN 4 //D2
#define RST_PIN 5 //D1

MFRC522 mfrc522(SDA_PIN, RST_PIN);

void setup() {
  Serial.begin(9600);

  WiFi.hostname("NodeMCU");
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.println(".");
  }

  Serial.println("Wifi Connected");
  Serial.println("IP Address : ");
  Serial.println(WiFi.localIP());

  pinMode(LED_PIN, OUTPUT);
  SPI.begin();
  mfrc522.PCD_Init();
  Serial.println("Dekatkan Kartu RFID Anda Ke Reader");
  Serial.println();
}

void loop() {
  digitalWrite(LED_PIN, LOW);
  String Link;


  if (!mfrc522.PICC_IsNewCardPresent())
    return;

  if (!mfrc522.PICC_ReadCardSerial())
    return;

  String IDTAG = "";
  for (byte i = 0; i < mfrc522.uid.size; i++) {
    IDTAG += mfrc522.uid.uidByte[i];
  }

  Serial.print("ID Kartu: ");
Serial.println(IDTAG);

  digitalWrite(LED_PIN, HIGH);

  WiFiClient client;
  const int httpPort = 80;
  if(!client.connect(host, httpPort)){
    Serial.println("Connection Failed");
    return;
  }

  HTTPClient http;
  Link = "http://192.168.18.13/Web/PrakWeb/Project_IOT/kirimkartu.php?nokartu=" + IDTAG;

  if (!http.begin(client, Link)) {
    Serial.println("Connection Failed");
    return;
  }

  int httpCode = http.GET();
  String payload = http.getString();
  Serial.println(payload);
  http.end();

  delay(1000);
}