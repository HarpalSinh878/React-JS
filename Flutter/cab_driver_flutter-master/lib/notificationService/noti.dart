import 'dart:io';

import 'package:cabdriver/AllWidget/configMap.dart';
import 'package:cabdriver/DataHandler/Riderdetails.dart';
import 'package:cabdriver/main.dart';
import 'package:cabdriver/notificationService/NotificatinDialog.dart';
import 'package:firebase_database/firebase_database.dart';
import 'package:firebase_messaging/firebase_messaging.dart';
import 'package:flutter/material.dart';
import 'package:google_maps_flutter/google_maps_flutter.dart';

class NotificaionService{
  FirebaseMessaging firebaseMessaging=new FirebaseMessaging();

  Future initialize(BuildContext context) async{
    await firebaseMessaging.configure(onMessage: (Map<String,dynamic>message){
      print('onmessage:'+message.toString()+"/${message['notification']["title"]}");
      if(message['notification']["title"]!=null){
        audioplayer.setAsset("sound/noti.mp3");
        audioplayer.setClip(start:Duration(seconds: 0), end:Duration(seconds: 60));
        audioplayer.play();
      }
      retriveRiderId( getRiderId(message),context);
    },onLaunch:(Map<String,dynamic>message){
      print('onLaunch:'+message.toString());
      if(message['notification']["title"]!=null){
        audioplayer.setAsset("sound/noti.mp3");
        audioplayer.setClip(start:Duration(seconds: 0), end:Duration(seconds: 60));
        audioplayer.play();
      }
      retriveRiderId( getRiderId(message),context);
    },onResume: (Map<String,dynamic>message){
      print('onmResume:'+message.toString());
      if(message['notification']["title"]!=null){
        audioplayer.setAsset("sound/noti.mp3");
        audioplayer.setClip(start:Duration(seconds: 0), end:Duration(seconds: 60));
        audioplayer.play();
      }
      retriveRiderId( getRiderId(message),context);
    } ) ;
  }
  Future<String> getToken() async{
    String token=await firebaseMessaging.getToken();
    driverRef.child(currentfirebaseuser.uid).child("token").set(token);
    print("getToken:"+token);
    await firebaseMessaging.subscribeToTopic("alldrivers");
    await firebaseMessaging.subscribeToTopic("allusers");

  }
  String getRiderId(Map<String,dynamic>riderrId){
    String riderId="";
    if(Platform.isAndroid){
      riderId=riderrId["data"]["ride_request_id"];
      print("riderId:"+riderId);
    }else{
      riderId=riderrId["data"]["ride_request_id"];
      print("riderId:"+riderId);
    }
    return riderId;
  }

  void retriveRiderId(String requestId,BuildContext context){

    riderReuestref.child(requestId).once().then((DataSnapshot dataSnapshot){
      if(dataSnapshot!=null){
        /*assestAudioplayer.open(Audio("sounds/noti.mp3"));
        assestAudioplayer.play();*/

        double pickloctionlat=double.parse(dataSnapshot.value["pickinfo"]["latitude"].toString());
        double pickloctionlng=double.parse(dataSnapshot.value["pickinfo"]["longitude"].toString());
        String pickup_addrs=dataSnapshot.value["pick_address"];
         print("picklat:${pickloctionlat}");
        double dropoffloctionlat=double.parse(dataSnapshot.value["dropinfo"]["latitude"].toString());
        double dropoffloctionlng=double.parse(dataSnapshot.value["dropinfo"]["longitude"].toString());
        String dropoff_addrs=dataSnapshot.value["drop_address"];
        String payment=dataSnapshot.value["driver_id"];
        String rider_name=dataSnapshot.value["rider_name"];
        String rider_phone=dataSnapshot.value["contact"];

        RiderDetails riderDetails=new RiderDetails();
        riderDetails.pick_latlng=LatLng(pickloctionlat, pickloctionlng);
        riderDetails.pick_address=pickup_addrs;
        riderDetails.dropoff_latlng=LatLng(dropoffloctionlat, dropoffloctionlng);
        riderDetails.drop_address=dropoff_addrs;
        riderDetails.payment_method=payment;
        riderDetails.ride_request_id=requestId;
        riderDetails.rider_name=rider_name;
        riderDetails.rider_phone=rider_phone;

        print("riderInfo:"+rider_name+"/"+rider_phone+"/"+pickloctionlng.toString());

        showDialog(context: context,
            builder: (BuildContext context)=>NotificationDialog(riderDetails).dialog(context)
       ,barrierDismissible: false );

      }
    });


  }
}