import 'dart:async';
import 'dart:math';

import 'package:cabdriver/AllWidget/Collectfareamount.dart';
import 'package:cabdriver/AllWidget/configMap.dart';
import 'package:cabdriver/AllWidget/progressDialog.dart';
import 'package:cabdriver/Asssitances/AssitanceMethods.dart';
import 'package:cabdriver/Asssitances/map-kitAssistance.dart';
import 'package:cabdriver/DataHandler/Riderdetails.dart';
import 'package:cabdriver/main.dart';
import 'package:firebase_database/firebase_database.dart';
import 'package:flutter/material.dart';
import 'package:flutter_polyline_points/flutter_polyline_points.dart';
import 'package:geolocator/geolocator.dart';
import 'package:google_maps_flutter/google_maps_flutter.dart';

class NewRiderScreen extends StatefulWidget {
 RiderDetails riderDetails;
 NewRiderScreen({this.riderDetails});
 static final CameraPosition cameraPosition=
 CameraPosition(target: LatLng(37.42796133580664, -122.085749655962),
   zoom: 14.4746,);
  @override
  _NewRiderScState createState() => _NewRiderScState();
}

class _NewRiderScState extends State<NewRiderScreen> {
  double bottomapadding=0.0;
  Set<Marker>markerset=Set<Marker>();
  Set<Polyline>polylineset=Set<Polyline>();
  Set<Circle>circleSet=Set<Circle>();
  List<LatLng>polylineCoordinate=[];
  PolylinePoints polylinePoints=PolylinePoints();

  GoogleMapController riderController;
  Completer<GoogleMapController>ridercompleter=Completer();
  var geolocator=Geolocator();
  LocationOptions locationOptions=LocationOptions(accuracy: LocationAccuracy.bestForNavigation);
  BitmapDescriptor animatedIcons;
  Position mypostion;
String status="accepted";
String rideDuration="";
bool isDirectionrequest=false;
String btnTitle="Arrived";
Color btncolor=Colors.blueAccent;
int timercounter=0;
Timer timer;

  @override
  void initState() {
     acceptedRide();
    super.initState();
  }


  @override
  Widget build(BuildContext context) {
    createIcon();
    return Scaffold(
      body: Stack(
        children: [
          GoogleMap(padding:  EdgeInsets.only(bottom: bottomapadding),
            initialCameraPosition:NewRiderScreen.cameraPosition,
          onMapCreated: (GoogleMapController controller) async{
              ridercompleter.complete(controller);
               riderController=controller;
               var currentpos=LatLng(currentposion.latitude, currentposion.longitude);
               var pickpos=widget.riderDetails.pick_latlng;
             await placesDirection(currentpos, pickpos);
              getRiderLocationUpdatelive();
               setState(() {
                 bottomapadding=260.0;
               });
          },markers: markerset,
            polylines: polylineset,
            circles: circleSet,
            mapType: MapType.normal,
          myLocationButtonEnabled: true,
          myLocationEnabled: true,),
          Positioned(right: 0,left: 0,bottom: 0,
              child: Container(
                margin:  const EdgeInsets.symmetric(horizontal: 6,
                    vertical: 0),
                padding: const EdgeInsets.symmetric(horizontal: 34,
                vertical: 20),
                height: 320,
            decoration: BoxDecoration(
              color: Colors.white,
               borderRadius: BorderRadius.only(topRight: Radius.circular(20),
               topLeft: Radius.circular(20))
            ),child: Column(
                children: [
                  Text("${rideDuration}",style: TextStyle(
                    color: Colors.grey,fontSize: 16,fontWeight: FontWeight.bold
                  ),),
                  SizedBox(
                    height: 15,
                  ),
                  Row(mainAxisAlignment: MainAxisAlignment.spaceBetween,
                    children: [
                      Text(widget.riderDetails.rider_name,style: TextStyle(
                          color: Colors.grey,fontSize: 20,fontWeight: FontWeight.bold
                      ),),
                      Icon(Icons.phone_android,size: 40,)
                    ],
                  ),
                  SizedBox(height: 20,),
                  Row(
                    mainAxisAlignment: MainAxisAlignment.start,
                    children: [
                      Image.asset("images/pickicon.png",width: 20,height: 20,),
                      SizedBox(width: 20,),
                      Text(widget.riderDetails.pick_address,style: TextStyle(
                          color: Colors.grey,fontSize: 16,fontWeight: FontWeight.bold
                      ),),
                    ],
                  ),
                  SizedBox(height: 16,),
                  Row(
                    mainAxisAlignment: MainAxisAlignment.start,
                    children: [
                      Image.asset("images/desticon.png",width: 20,height: 20,),
                      SizedBox(width: 20,),
                      Text(widget.riderDetails.drop_address,style: TextStyle(
                          color: Colors.grey,fontSize: 16,fontWeight: FontWeight.bold
                      ),),
                    ],
                  ),
                  SizedBox(height: 6,),
                  Padding(padding: const EdgeInsets.symmetric(horizontal: 15,vertical: 15),
                  child: Container(
                    color: btncolor,
                    child: FlatButton(
                      onPressed: ()async{
                        acceptedRide();
                       /*  if(status==""){
                          setState(() {
                            status="accepted";
                            var requestRiderid=widget.riderDetails.ride_request_id;
                            riderReuestref.child(requestRiderid).child("status").set(status);
                          });
                         }
                        else*/ if(status=="accepted"){
                          setState(() {
                            status="arrived";
                            btncolor=Colors.purple;
                            btnTitle="Start Trip";
                          });
                          var requestRiderid=widget.riderDetails.ride_request_id;
                          riderReuestref.child(requestRiderid).child("status").set(status);
                          showDialog(context: context,
                            barrierDismissible: false,
                             builder: (context)=>ProgressDialog(message: "Please wait....",)
                          );
                          await AssitanceMethods.getPlacesDirections(widget.riderDetails.pick_latlng,
                              widget.riderDetails.dropoff_latlng);
                          Navigator.pop(context);
                        }else if(status=="arrived") {
                          status="onride";
                          var requestRiderid=widget.riderDetails.ride_request_id;
                          riderReuestref.child(requestRiderid).child("status").set(status);
                          setState(() {
                            btnTitle="End Trip";
                            btncolor=Colors.redAccent;
                          });
                          timerInterval();
                        }else if(status=="onride"){
                          endTrip();
                        }
                      },
                       shape: RoundedRectangleBorder(
                         borderRadius: BorderRadius.circular(5),
                       ),
                      color: btncolor,
                      child: Row(
                        mainAxisAlignment: MainAxisAlignment.spaceBetween,
                        children: [
                          Text(btnTitle,style: TextStyle(
                              color: Colors.white,fontSize: 16,fontWeight: FontWeight.bold
                          ),),
                          Icon(Icons.car_rental,color: Colors.white,),
                        ],
                      ),
                    ),
                  ),)
                ],
              ),
          ))
        ],
      )
    );
  }

  Future<void> placesDirection(LatLng picklatlng,LatLng dropplatlng ) async {

    showDialog(context: context,
        builder: (BuildContext context) =>
            ProgressDialog(message: "Please wait...",));
    var details = await AssitanceMethods.getPlacesDirections(
        picklatlng, dropplatlng);
     setState(() {
       //_getplaceDirection = details;
     });
    Navigator.pop(context);
    print("placeEndpoints:" + details.ecodedpoints);
    polylineCoordinate.clear();
    PolylinePoints polylinePoints = PolylinePoints();
    List<PointLatLng>decodepointltlng = polylinePoints.decodePolyline(
        details.ecodedpoints);
    if (decodepointltlng.isNotEmpty) {
      decodepointltlng.forEach((PointLatLng pointLatLng) {
        polylineCoordinate.add(
            LatLng(pointLatLng.latitude, pointLatLng.longitude));
      });
    }
    polylineset.clear();
    setState(() {
      Polyline polyline = Polyline(
        polylineId: PolylineId("polyid"),
        color: Colors.pink,
        width: 5,
        endCap: Cap.roundCap,
        geodesic: true,
        points: polylineCoordinate,
      );
      polylineset.add(polyline);
    });
    LatLngBounds latLngBounds;
    if (picklatlng.latitude > dropplatlng.latitude &&
        picklatlng.longitude > dropplatlng.longitude) {
      latLngBounds =
          LatLngBounds(southwest: dropplatlng, northeast: picklatlng);
    } else if (picklatlng.longitude > dropplatlng.longitude) {
      latLngBounds = LatLngBounds(
          southwest: LatLng(picklatlng.latitude, dropplatlng.longitude),
          northeast: LatLng(dropplatlng.latitude, picklatlng.longitude));
    }
    else if (picklatlng.latitude > dropplatlng.latitude) {
      latLngBounds = LatLngBounds(
          southwest: LatLng(dropplatlng.latitude, picklatlng.longitude),
          northeast: LatLng(picklatlng.latitude, dropplatlng.longitude));
    } else {
      latLngBounds =
          LatLngBounds(southwest: picklatlng, northeast: dropplatlng);
    }
    riderController.animateCamera(
        CameraUpdate.newLatLngBounds(latLngBounds, 70));
    Marker pickmarker = Marker(markerId: MarkerId("markid"),
        icon: BitmapDescriptor.defaultMarkerWithHue(BitmapDescriptor.hueYellow)
        , position: picklatlng,
        infoWindow: InfoWindow(
           /* title: initpos.placesName,*/ snippet: "PickupLocation"));

    Marker dropoffmarker = Marker(markerId: MarkerId("dropoffid"),
        icon: BitmapDescriptor.defaultMarkerWithHue(BitmapDescriptor.hueRed)
        , position: dropplatlng,
        infoWindow: InfoWindow(
            /*title: finalpos.placesName,*/ snippet: "DropOffLocation"));
    Circle pickcircle = Circle(circleId: CircleId("pickcid"),
        fillColor: Colors.blue,
        center: picklatlng,
        radius: 20.0,
        strokeWidth: 3);
    Circle dropoffcircle = Circle(circleId: CircleId("dropoffid"),
        fillColor: Colors.yellow,
        center: dropplatlng,
        radius: 20.0,
        strokeWidth: 3);
    markerset.add(pickmarker);
    markerset.add(dropoffmarker);
    circleSet.add(pickcircle);
    circleSet.add(dropoffcircle);
  }
  void acceptedRide(){
    var requestRiderid=widget.riderDetails.ride_request_id;
    print("requestriderid;${requestRiderid}");
    riderReuestref.child(requestRiderid).child("status").set("accepted");
    riderReuestref.child(requestRiderid).child("driver_name").set(driversInfo.name);
    riderReuestref.child(requestRiderid).child("driver_email").set(driversInfo.email);
    riderReuestref.child(requestRiderid).child("driver_phone").set(driversInfo.phone);
    riderReuestref.child(requestRiderid).child("driver_phone").set(driversInfo.phone);
    riderReuestref.child(requestRiderid).child("car_details").
    set("${driversInfo.car_name}-${driversInfo.car_color}-${driversInfo.car_number}");

    Map carloc={
      "latitude":currentposion.latitude,
      "longitude":currentposion.longitude
    };
    riderReuestref.child(requestRiderid).child("car_details").set(carloc);
    driverRef.child(currentfirebaseuser.uid).child("history").
    child(requestRiderid).set(true);
  }

  void createIcon(){
    if(animatedIcons==null){
      ImageConfiguration imageConfiguration=
      createLocalImageConfiguration(context,size: Size(2, 2), );
      BitmapDescriptor.fromAssetImage(imageConfiguration, "images/rider2.png").
     then((value){
       animatedIcons=value;
      });
    }
  }
  void getRiderLocationUpdatelive(){
    LatLng olpos=LatLng(0,0);
  riderTagsubscription=Geolocator.getPositionStream().listen((Position position) {
    currentposion=position;
    mypostion=position;
    var rots=MapkitAssitance.getRiderheadcalcultion(olpos.longitude,olpos.longitude,
    mypostion.latitude,mypostion.longitude);
    LatLng mpositions=LatLng(position.latitude,position.longitude);
    Marker animarker=Marker(markerId: MarkerId("animating"),
            icon: animatedIcons,
            position:mpositions,
            rotation: rots,
         infoWindow: InfoWindow(title: "Current position"));
    setState(() {
      CameraPosition camerposition=new CameraPosition(target:mpositions ,zoom: 17);
      riderController.animateCamera(CameraUpdate.newCameraPosition(camerposition));
      markerset.removeWhere((maker) => maker.markerId.value=="animating");
      markerset.add(animarker);

    });
    var requestRiderid=widget.riderDetails.ride_request_id;
    olpos=mpositions;
    riderDetails();
    Map carloc={
      "latitude":currentposion.latitude,
      "longitude":currentposion.longitude
    };
    riderReuestref.child(requestRiderid).child("car_details").set(carloc);
  });
  }
  void riderDetails()async{
    if(isDirectionrequest==false){
      isDirectionrequest=true;
      if(mypostion==null){
        return;
      }
      var postn=LatLng(mypostion.latitude, mypostion.longitude);
      LatLng destinationlatlng;
      if(status=="accepted"){
        destinationlatlng=widget.riderDetails.pick_latlng;
      }else{
        destinationlatlng=widget.riderDetails.dropoff_latlng;
      }
      var directiondetails=await AssitanceMethods.getPlacesDirections(postn, destinationlatlng);
      if(directiondetails!=null){
        setState(() {
          rideDuration=directiondetails.durationText;
        });
      }
      isDirectionrequest=false;
    }

  }
  void timerInterval() {
    const interval=Duration(seconds: 1);
    timer=Timer.periodic(interval, (timer) {
      timercounter=timercounter+1;
    });
  }

  void endTrip() async{
    timer.cancel();
    showDialog(context: context,
        builder:(context)=>ProgressDialog(message: "Please wait....",) );
    var currentlatlng=LatLng(mypostion.latitude, mypostion.longitude);
    var riderDirections= await AssitanceMethods.getPlacesDirections(currentlatlng,
        widget.riderDetails.pick_latlng);
    Navigator.pop(context);
    var fare=AssitanceMethods.calculatefare(riderDirections);
    var requestRiderid=widget.riderDetails.ride_request_id;
    riderReuestref.child(requestRiderid).child("fares").set(fare.toString());
    riderReuestref.child(requestRiderid).child("status").set("ended");
    riderTagsubscription.cancel();
    showDialog(context: context,
    barrierDismissible: false,
    builder: (context)=>CollectAmuntfare(fareamount: fare,fareMethod:widget.riderDetails.payment_method,));
    saveFareEarning(fare);
  }

  void saveFareEarning(int fareamount){
    driverRef.child(currentfirebaseuser.uid).child("earnings").once()
        .then((DataSnapshot dataSnapshot){
          if(dataSnapshot.value!=null){
            var oldearning=double.parse(dataSnapshot.value.toString());
            var totalEarnin=(fareamount+oldearning);
            driverRef.child(currentfirebaseuser.uid).child("earnings")
            .set(totalEarnin.toStringAsFixed(2));
          }else{
            double totalamount=fareamount.toDouble();
            driverRef.child(currentfirebaseuser.uid).child("earnings")
                .set(totalamount.toStringAsFixed(2));
          }
    });
  }

}
