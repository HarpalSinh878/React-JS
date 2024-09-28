
import 'package:cabdriver/AllWidget/configMap.dart';
import 'package:cabdriver/Asssitances/getDirectionss.dart';
import 'package:cabdriver/Asssitances/requestAssitance.dart';
import 'package:cabdriver/DataHandler/Address.dart';
import 'package:cabdriver/DataHandler/Appdata.dart';
import 'package:cabdriver/DataHandler/Userinfo.dart';
import 'package:firebase_auth/firebase_auth.dart'; 
import 'package:firebase_core/firebase_core.dart';
import 'package:firebase_database/firebase_database.dart';
import 'package:flutter_geofire/flutter_geofire.dart';
import 'package:geolocator/geolocator.dart';
import 'package:google_maps_flutter/google_maps_flutter.dart';
import 'package:provider/provider.dart';

class AssitanceMethods{
  /*static Future<String>searchGeocoding(Position position,context)async{
    String placeaddress="";
    String st,st2,st3,st4,st5;
    String url="https://maps.googleapis.com/maps/api/geocode/json?latlng=${position.latitude},${position.longitude}&key=${mapkey}";
   var reponse= await RequestAssitance.getRequest(url);
    if(reponse!=""){
      st=reponse["results"][0]["address_components"][3]["long_name"];
      st2=reponse["results"][0]["address_components"][4]["long_name"];
      st3=reponse["results"][0]["address_components"][5]["long_name"];
      st4=reponse["results"][0]["address_components"][6]["long_name"];
     // st5=reponse["results"][0]["address_components"][4]["long_name"];
    placeaddress=  st+","+st2+"\n"+st3;
    print(placeaddress);
    Address address=new Address();
   // address.placesAddress=placeaddress;
    address.latitude=position.latitude;
    address.longitude=position.longitude;
    address.placesName=placeaddress;
    Provider.of<AppData>(context,listen: false).updateLocation(address);
    }
    return placeaddress;
  }*/

  static Future<GetplaceDirection> getPlacesDirections(LatLng initialpos,LatLng destinpos)async{
    String url="https://maps.googleapis.com/maps/api/directions/json?origin=${initialpos.latitude},${initialpos.longitude}&destination=${destinpos.latitude},${destinpos.longitude}&key=${mapkey}";
    var res=await RequestAssitance.getRequest(url);
    if(res=="failed"){
      return null;
    }
      GetplaceDirection getplaceDirection=new GetplaceDirection();
      getplaceDirection.ecodedpoints=res["routes"][0]["overview_polyline"]["points"];

    getplaceDirection.durationvalue= res["routes"][0]["legs"][0]["duration"]["value"];
     getplaceDirection.durationText= res["routes"][0]["legs"][0]["duration"]["text"];

      getplaceDirection.distancevalue= res["routes"][0]["legs"][0]["distance"]["value"];
      getplaceDirection.distanceText= res["routes"][0]["legs"][0]["distance"]["text"];
      print("getplacedetails:"+getplaceDirection.ecodedpoints);
  return getplaceDirection;

  }
  static int calculatefare(GetplaceDirection getplaceDirection){
    double timebasefare= (getplaceDirection.durationvalue/60)*.70;
    double distbasefare= (getplaceDirection.durationvalue/1000)*.70;
    double totalfare=(timebasefare+distbasefare);
    //local currency;
    double localcurn=(totalfare*75);
    return localcurn.truncate();
  }
  /*static void getUserInfo() async{
    firebaseuser =await FirebaseAuth.instance.currentUser;
    String uid=firebaseuser.uid;
    DatabaseReference reference=  FirebaseDatabase.instance.reference().child("user").child(uid);
   reference.once().then((userdatavalue){
     if(userdatavalue.value!=null){
       currentUserInfo=Users.fromSnapshot(userdatavalue);
     }
   });
  }*/
static void disableHomeUpdatelocation(){
  homeTagsubscription.pause();
  Geofire.removeLocation(currentfirebaseuser.uid);
}
static void enableHomeupdatelocation(){
  homeTagsubscription.resume();
  Geofire.setLocation(currentfirebaseuser.uid,currentposion.latitude, currentposion.longitude);
}
}