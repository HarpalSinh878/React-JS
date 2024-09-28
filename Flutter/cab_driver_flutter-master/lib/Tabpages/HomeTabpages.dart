import 'dart:async';

import 'package:cabdriver/AllWidget/configMap.dart';
import 'package:cabdriver/Allscreens/Register.dart';
import 'package:cabdriver/DataHandler/DriverInfo.dart';
import 'package:cabdriver/main.dart';
import 'package:cabdriver/notificationService/noti.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:firebase_database/firebase_database.dart';
import 'package:flutter/material.dart';
import 'package:flutter_geofire/flutter_geofire.dart';
import 'package:geolocator/geolocator.dart';
import 'package:google_maps_flutter/google_maps_flutter.dart';

class Hometabspage extends StatefulWidget {
  @override
  _HometabspageState createState() => _HometabspageState();
}

class _HometabspageState extends State<Hometabspage> {
  String drivertext="Offline now - Go online";
  Color backgroundcol=Colors.black;
  bool isavailable=false;
  Completer<GoogleMapController>_controller=Completer();
  GoogleMapController newcontroller;
 static double latitude,longititude;
  static final CameraPosition cameraPosition = CameraPosition(
    target: LatLng(37.42796133580664, -122.085749655962),
    zoom: 14.4746,
  );
  locationUpdate() async{
    Position position=await Geolocator.getCurrentPosition(desiredAccuracy: LocationAccuracy.high);
    setState(() {
      currentposion=position;
      latitude=currentposion.latitude;
      longititude=currentposion.longitude;
      CameraPosition cmposition=new CameraPosition(target:
      LatLng(currentposion.latitude,currentposion.longitude),zoom: 16);
      newcontroller.animateCamera(CameraUpdate.newCameraPosition(cmposition));
    });

  }

  @override
  void initState() {
    // TODO: implement initState
    super.initState();
    //locationUpdate();
    gerCurrentDriverinfo();
  }
  void gerCurrentDriverinfo()async{
    currentfirebaseuser=await FirebaseAuth.instance.currentUser;
    NotificaionService notificaionService=new NotificaionService();
    driverRef.child(currentfirebaseuser.uid).once().then((DataSnapshot dataSnapshot){
      if(dataSnapshot.value!=null){
        driversInfo=Drivers.fromsnapShot(dataSnapshot);
      }
    });
    notificaionService.initialize(context);
    notificaionService.getToken();
  }

  @override
  Widget build(BuildContext context) {
    return Stack(
      children: [
       GoogleMap(
         initialCameraPosition: cameraPosition,
         mapType: MapType.normal,
         onMapCreated: (GoogleMapController controller){
           _controller.complete(controller);
           newcontroller=controller;
           locationUpdate();
         }, myLocationEnabled: true,
         myLocationButtonEnabled: true,
       ),
        Container(
          alignment: Alignment.center,
          height: 140,
          width: double.maxFinite,
          color: Colors.black54,
        ),
        Positioned(child: Padding(
          child: Container(
            width: 200,
            height: 50,
            child: RaisedButton(
              padding: const EdgeInsets.all(5),
              child: Text(drivertext,style: TextStyle(color: Colors.white,
            fontSize: 15),),
              color: backgroundcol,
              onPressed: (){
                if(isavailable!=true){
                  makeDriveronline();
                  updateliveLocation();
                 setState(() {
                   drivertext="Online now";
                   backgroundcol=Colors.green;
                   isavailable=true;
                   showToast("Driver online now", context);
                 });
                }else{
                  setState(() {
                    drivertext="Offline now - Go online";
                    backgroundcol=Colors.black;
                    isavailable=false;
                  });
                  makedriveroffline();
                  showToast("Driver offline now", context);
                }
              },
            ),
          ),padding: const EdgeInsets.symmetric(horizontal: 90,vertical: 58),
        ))

      ],
    );
  }
void  makeDriveronline()async{
  Position position=await Geolocator.getCurrentPosition(desiredAccuracy: LocationAccuracy.high);
  currentposion=position;
    Geofire.initialize("availableDrivers");
   await Geofire.setLocation(currentfirebaseuser.uid,
        currentposion.latitude, currentposion.longitude);
   tripRequestref.set("searching");
   tripRequestref.onValue.listen((event) { });
}
void updateliveLocation()async{
 homeTagsubscription=Geolocator.getPositionStream().listen((Position position) {
   currentposion=position;
    if(isavailable==true){
      Geofire.setLocation(currentfirebaseuser.uid, currentposion.latitude, currentposion.longitude);
    }
   LatLng latLng=new LatLng(currentposion.latitude, currentposion.longitude);
   newcontroller.animateCamera(CameraUpdate.newLatLng(latLng));
 });
}
void makedriveroffline()async{
  await Geofire.removeLocation(currentfirebaseuser.uid);
  tripRequestref.onDisconnect();
  tripRequestref.remove();
  tripRequestref=null;
}
}
