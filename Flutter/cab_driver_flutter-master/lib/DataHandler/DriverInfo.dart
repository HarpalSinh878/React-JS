import 'package:firebase_database/firebase_database.dart';

class Drivers{
  String name;
  String phone;
  String email;
  String id;
  String car_color;
  String car_number;
  String car_name;
  Drivers({this.name,this.phone,this.email,this.id,this.car_color,
  this.car_name,this.car_number});
  Drivers.fromsnapShot(DataSnapshot dataSnapshot){
    id=dataSnapshot.key;
    if(dataSnapshot.value["car_details"]!=null){
      name=dataSnapshot.value["name"];
      email=dataSnapshot.value["email"];
      phone=dataSnapshot.value["phone"];
      car_name=dataSnapshot.value["car_details"]["car_name"]??"";
      car_number=dataSnapshot.value["car_details"]["car_number"]??"";
      car_color=dataSnapshot.value["car_details"]["car_color"]??"";
    }

  }
}