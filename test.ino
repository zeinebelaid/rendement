#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>

const char* ssid = "laptop0";
const char* password = "laptop12345";
const char* serverName = "http://172.16.43.88/count/handle_request.php"; // Remplacez par l'URL de votre script PHP

int buttonStartPin = 2; //BT2
int buttonStopPin = 3;//BT2
int buttonCountPin = 1;//BT4

String matricule = ""; // Initialiser comme une chaîne vide

void setup() {
  Serial.begin(9600);
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  
  Serial.println("Connected to WiFi");
  
  pinMode(buttonStartPin, INPUT_PULLUP);
  pinMode(buttonStopPin, INPUT_PULLUP);
  pinMode(buttonCountPin, INPUT_PULLUP);
}

void loop() {
  if (digitalRead(buttonStartPin) == LOW) { // Si le bouton Start est pressé
    matricule="1252";
    Serial.println("1 Si le bouton Start est pressé D3");
    delay(1000); // Debounce
  }

  if (digitalRead(buttonStopPin) == LOW) { // Si le bouton Stop est pressé
    matricule="256255";
    Serial.println("2 Si le bouton Start est pressé D4");
    //sendRequest("addPiece","2");
  

    delay(1000); // Debounce
  }

  if (digitalRead(buttonCountPin) == LOW) { // Si le bouton Count est pressé
    Serial.println("3 Si le bouton Start est pressé D5");
    sendRequest("addPiece","1");
    delay(1000); // Debounce
  }
}

void sendRequest(String action,String piece) {
  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;
    WiFiClient client;
    String url = String(serverName) + "?action=" + action + "&matricule=" + matricule+"&piece=" +piece;
    
    http.begin(client, url); // Utiliser WiFiClient comme argument
    int httpCode = http.GET();
    
    if (httpCode > 0) {
      String payload = http.getString();
      Serial.println(payload);
    } else {
      Serial.println("Error in HTTP request");
    }
    
    http.end();
  } else {
    Serial.println("Not connected to WiFi");
  }
}
