
#include <LiquidCrystal_I2C.h>
#include <Adafruit_Fingerprint.h>
#include <Wire.h>

//I2C pins declaration
LiquidCrystal_I2C lcd(0x27, 16, 2);

int GREEN_LED = 6;
int RED_LED = 5;
int LOCK = 10;

int data = 0;
int id;
char checkChar = ' ';

// pin #2 is IN from sensor (GREEN wire)
// pin #3 is OUT from arduino  (WHITE wire)
SoftwareSerial mySerial(2, 3);

Adafruit_Fingerprint finger = Adafruit_Fingerprint(&mySerial);

void setup()  
{
  lcd.init();
  lcd.begin(16,2);//Initializing display
  lcd.backlight();//To Power ON the back light
  
  pinMode(GREEN_LED, OUTPUT);
  pinMode(RED_LED, OUTPUT);
  pinMode(LOCK, OUTPUT);
  Serial.begin(9600);
  while (!Serial);  // For Yun/Leo/Micro/Zero/...
  delay(100);


  // set the data rate for the sensor serial port
  finger.begin(57600);
  delay(5);
  if (finger.verifyPassword()) {

  } else {

    while (1) { delay(1); }
  }

  finger.getTemplateCount();

}

void loop()                     // run over and over again
{
  delay(50);            //don't ned to run this at full speed.
  lcd_start();

  if(Serial.available() > 0){
    data = Serial.read();

    switch(data){
    case 'l':
      checkChar='l';
      break;
    case 'j':
      checkChar='j';
      break;
    case 'k':
      checkChar='k';
      break;
    case 'n':
      checkChar='n';
      break;
    case 'y':
      checkChar='y';
      break;
    case 'a'://a van ADD (WERKT OP HET ID)
      getFingerprintEnroll();
      break;
    case 'd'://d van delete(WERKT OP HET ID)
      deleteFingerprint();
      break;
    case 'e'://e van empty
      emptyDatabase();
      break;
    case 'o'://o van open
      open_deur();
      break;
    case 'r':
      midi();
      break;
    case 'i':// zet het ID door i[ID] in de serial te zetten
      long incomingLong = Serial.parseInt();
      if((incomingLong > 0) && (incomingLong < 128)){
        id = incomingLong;
      }
      break;
    
    }
  }
  else{
    getFingerprintID();
  }
}

//scan functie die matcht met prints in de database
uint8_t getFingerprintID() {
  uint8_t p = finger.getImage();
  switch (p) {
    case FINGERPRINT_OK:

      break;
    case FINGERPRINT_NOFINGER:

      return p;
    case FINGERPRINT_PACKETRECIEVEERR:

      return p;
    case FINGERPRINT_IMAGEFAIL:

      return p;
    default:

      return p;
  }

  // OK success!

  p = finger.image2Tz();
  switch (p) {
    case FINGERPRINT_OK:

      lcd_wachten();
      break;
    case FINGERPRINT_IMAGEMESS:

      return p;
    case FINGERPRINT_PACKETRECIEVEERR:

      return p;
    case FINGERPRINT_FEATUREFAIL:

      return p;
    case FINGERPRINT_INVALIDIMAGE:

      return p;
    default:

      return p;
  }
  
  // OK converted!
  p = finger.fingerFastSearch();
  if (p == FINGERPRINT_OK) {

  } else if (p == FINGERPRINT_PACKETRECIEVEERR) {

    return p;
  } else if (p == FINGERPRINT_NOTFOUND) {
    Serial.println(0);
    knipper_RED();
    lcd_bellen();
    return p;
  } else {

    return p;
  }   
  
  // found a match!
  Serial.println(finger.fingerID);
  return finger.fingerID;
}

//voeg een vingerprint toe
uint8_t getFingerprintEnroll() {

  int p = -1;
  lcd.clear();
  lcd.setCursor(0,0); //Defining positon to write from first row,first column .
  lcd.print("Add finger"); //You can write 16 Characters per line .
  lcd.setCursor(0,1);  //Defining positon to write from second row,first column .
  lcd.print(id);
  while (p != FINGERPRINT_OK) {
    p = finger.getImage();
    switch (p) {
    case FINGERPRINT_OK:

      break;
    case FINGERPRINT_NOFINGER:
    
      break;
    case FINGERPRINT_PACKETRECIEVEERR:
      lcd_failed();
      break;
    case FINGERPRINT_IMAGEFAIL:
      lcd_failed();
      break;
    default:
      lcd_failed();
      break;
    }
  }

  // OK success!

  p = finger.image2Tz(1);
  switch (p) {
    case FINGERPRINT_OK:

      break;
    case FINGERPRINT_IMAGEMESS:
      lcd_failed();
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      lcd_failed();
      return p;
    case FINGERPRINT_FEATUREFAIL:
      lcd_failed();
      return p;
    case FINGERPRINT_INVALIDIMAGE:
      lcd_failed();
      return p;
    default:
      lcd_failed();
      return p;
  }
  lcd.clear();
  lcd.setCursor(0,0); //Defining positon to write from first row,first column .
  lcd.print("Remove finger"); //You can write 16 Characters per line .
  lcd.setCursor(0,1);  //Defining positon to write from second row,first column .
  lcd.print(id);
  delay(2000);
  p = 0;
  while (p != FINGERPRINT_NOFINGER) {
    p = finger.getImage();
  }

  p = -1;
  lcd.clear();
  lcd.setCursor(0,0); //Defining positon to write from first row,first column .
  lcd.print("place same one"); //You can write 16 Characters per line .
  lcd.setCursor(0,1);  //Defining positon to write from second row,first column .
  lcd.print(id);
  while (p != FINGERPRINT_OK) {
    p = finger.getImage();
    switch (p) {
    case FINGERPRINT_OK:

      break;
    case FINGERPRINT_NOFINGER:

      break;
    case FINGERPRINT_PACKETRECIEVEERR:
      lcd_failed();
      break;
    case FINGERPRINT_IMAGEFAIL:
      lcd_failed();
      break;
    default:
      lcd_failed();
      break;
    }
  }

  // OK success!

  p = finger.image2Tz(2);
  switch (p) {
    case FINGERPRINT_OK:

      break;
    case FINGERPRINT_IMAGEMESS:
      lcd_failed();
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      lcd_failed();
      return p;
    case FINGERPRINT_FEATUREFAIL:
      lcd_failed();
      return p;
    case FINGERPRINT_INVALIDIMAGE:
      lcd_failed();
      return p;
    default:
      lcd_failed();
      return p;
  }
  
  // OK converted!

  
  p = finger.createModel();
  if (p == FINGERPRINT_OK) {

  } else if (p == FINGERPRINT_PACKETRECIEVEERR) {
    lcd_failed();
    return p;
  } else if (p == FINGERPRINT_ENROLLMISMATCH) {
    lcd_failed();
    return p;
  } else {
    lcd_failed();
    return p;
  }   
  

  p = finger.storeModel(id);
  if (p == FINGERPRINT_OK) {
    lcd_done();
  } else if (p == FINGERPRINT_PACKETRECIEVEERR) {
    lcd_failed();
    return p;
  } else if (p == FINGERPRINT_BADLOCATION) {
    lcd_failed();
    return p;
  } else if (p == FINGERPRINT_FLASHERR) {
    lcd_failed();
    return p;
  } else {
    lcd_failed();
    return p;
  }   
}

//Verwijder 1 vingerprint op id
uint8_t deleteFingerprint() {
  uint8_t p = -1;
  
  p = finger.deleteModel(id);

  if (p == FINGERPRINT_OK) {
    
  } else if (p == FINGERPRINT_PACKETRECIEVEERR) {

    return p;
  } else if (p == FINGERPRINT_BADLOCATION) {

    return p;
  } else if (p == FINGERPRINT_FLASHERR) {

    return p;
  } else {

    return p;
  }   
}

//Haalt de COMPLETE database met prints leeg
void emptyDatabase(){
  finger.emptyDatabase();


}

void open_deur(){
  digitalWrite(GREEN_LED, HIGH);
  lcd_open();
  digitalWrite(LOCK, HIGH);

  tone(7, 500, 3000);
  delay(6000);

  lcd_start();
  digitalWrite(GREEN_LED, LOW);
  digitalWrite(LOCK, LOW);
}

void knipper_RED(){
  digitalWrite(RED_LED, HIGH);
  delay(100);
  digitalWrite(RED_LED,LOW);
  delay(100);
  digitalWrite(RED_LED, HIGH);
  delay(100);
  digitalWrite(RED_LED,LOW);
  delay(100);
  digitalWrite(RED_LED, HIGH);
  delay(100);
  digitalWrite(RED_LED,LOW);
  delay(100);
  digitalWrite(RED_LED, HIGH);
  delay(100);
  digitalWrite(RED_LED,LOW);
  delay(100);
  digitalWrite(RED_LED, HIGH);
  delay(100);
  digitalWrite(RED_LED,LOW);
  delay(100);
}

void lcd_start(){
  lcd.clear();
  if(checkChar == 'l'){
    lcd.setCursor(0,0); //Defining positon to write from first row,first column .
    lcd.print("Leg uw vinger"); //You can write 16 Characters per line .
    lcd.setCursor(0,1);  //Defining positon to write from second row,first column .
    lcd.print("Op de scanner!");
  }
  else if (checkChar == 'j'){
    lcd.setCursor(0,0); //Defining positon to write from first row,first column .
    lcd.print("GEEN"); //You can write 16 Characters per line .
    lcd.setCursor(0,1);  //Defining positon to write from second row,first column .
    lcd.print("JEHOVAGETUIGEN!");
  }    
  else if (checkChar == 'k'){
    lcd.setCursor(0,0); //Defining positon to write from first row,first column .
    lcd.print("Kom later terug"); //You can write 16 Characters per line .
    lcd.setCursor(0,1);  //Defining positon to write from second row,first column .
    lcd.print("Alsjeblieft!");
  }
  else if (checkChar == 'n'){
    lcd.setCursor(0,0); //Defining positon to write from first row,first column .
    lcd.print("NIET STOREN"); //You can write 16 Characters per line .
    lcd.setCursor(0,1);  //Defining positon to write from second row,first column .
    lcd.print("A.U.B.");
  }
  else if (checkChar == 'y'){
    lcd.setCursor(0,0); //Defining positon to write from first row,first column .
    lcd.print("Ik ben niet"); //You can write 16 Characters per line .
    lcd.setCursor(0,1);  //Defining positon to write from second row,first column .
    lcd.print("thuis!");
  }
  else{
    lcd.setCursor(0,0); //Defining positon to write from first row,first column .
    lcd.print("Leg uw vinger"); //You can write 16 Characters per line .
    lcd.setCursor(0,1);  //Defining positon to write from second row,first column .
    lcd.print("Op de scanner!");
  }
}

void lcd_wachten(){
  lcd.clear();
  lcd.setCursor(0,0); //Defining positon to write from first row,first column .
  lcd.print("Even wachten..."); //You can write 16 Characters per line .
  delay(500);
}

void lcd_open(){
  lcd.clear();
  lcd.setCursor(0,0);
  lcd.print("De deur is");
  lcd.setCursor(0,1);
  lcd.print("Geopend");
}

void lcd_bellen(){
  lcd.clear();
  tone(7, 1500, 250);
  delay(500);
  tone(7, 750, 250);
  lcd.setCursor(0,0);
  lcd.print("Er is..");
  lcd.setCursor(0,1);
  lcd.print("Aangebeld");
  delay(2500);
}

void lcd_failed(){
   lcd.clear();
  lcd.setCursor(0,0);
  lcd.print("failed...");
  lcd.setCursor(0,1);
  lcd.print("Try again..");
  delay(2500);
}

void lcd_done(){
  lcd.clear();
  lcd.setCursor(0,0);
  lcd.print("Done!");
  lcd.setCursor(0,1);
  lcd.print("Added print!");
  delay(2500);
}

void midi() {
    int tonePin = 7;
    tone(tonePin, 293, 131.004);
    delay(131.004);
    tone(tonePin, 293, 131.004);
    delay(131.004);
    tone(tonePin, 587, 262.008);
    delay(262.008);
    tone(tonePin, 440, 393.012);
    delay(393.012);
    tone(tonePin, 415, 262.008);
    delay(262.008);
    tone(tonePin, 391, 262.008);
    delay(262.008);
    tone(tonePin, 349, 262.008);
    delay(262.008);
    tone(tonePin, 293, 131.004);
    delay(131.004);
    tone(tonePin, 349, 131.004);
    delay(131.004);
    tone(tonePin, 391, 131.004);
    delay(131.004);
    tone(tonePin, 261, 131.004);
    delay(131.004);
    tone(tonePin, 261, 131.004);
    delay(131.004);
    tone(tonePin, 587, 262.008);
    delay(262.008);
    tone(tonePin, 440, 393.012);
    delay(393.012);
    tone(tonePin, 415, 262.008);
    delay(262.008);
    tone(tonePin, 391, 262.008);
    delay(262.008);
    tone(tonePin, 349, 262.008);
    delay(262.008);
    tone(tonePin, 293, 131.004);
    delay(131.004);
    tone(tonePin, 349, 131.004);
    delay(131.004);
    tone(tonePin, 391, 131.004);
    delay(131.004);
    tone(tonePin, 246, 131.004);
    delay(131.004);
    tone(tonePin, 246, 131.004);
    delay(131.004);
    tone(tonePin, 587, 262.008);
    delay(262.008);
    tone(tonePin, 440, 393.012);
    delay(393.012);
    tone(tonePin, 415, 262.008);
    delay(262.008);
    tone(tonePin, 391, 262.008);
    delay(262.008);
    tone(tonePin, 349, 262.008);
    delay(262.008);
    tone(tonePin, 293, 131.004);
    delay(131.004);
    tone(tonePin, 349, 131.004);
    delay(131.004);
    tone(tonePin, 391, 131.004);
    delay(131.004);
    tone(tonePin, 233, 131.004);
    delay(131.004);
    tone(tonePin, 233, 131.004);
    delay(131.004);
    tone(tonePin, 587, 262.008);
    delay(262.008);
    tone(tonePin, 440, 393.012);
    delay(393.012);
    tone(tonePin, 415, 262.008);
    delay(262.008);
    tone(tonePin, 391, 262.008);
    delay(262.008);
    tone(tonePin, 349, 262.008);
    delay(262.008);
    tone(tonePin, 293, 131.004);
    delay(131.004);
    tone(tonePin, 349, 131.004);
    delay(131.004);
    tone(tonePin, 391, 131.004);
    delay(131.004);
}
