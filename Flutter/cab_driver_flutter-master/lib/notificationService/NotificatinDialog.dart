
import 'package:cabdriver/AllWidget/configMap.dart';
import 'package:cabdriver/Allscreens/Register.dart';
import 'package:cabdriver/Allscreens/newRiderscreen.dart';
import 'package:cabdriver/Asssitances/AssitanceMethods.dart';
import 'package:cabdriver/DataHandler/Riderdetails.dart';
import 'package:cabdriver/main.dart';
import 'package:firebase_database/firebase_database.dart';
import 'package:flutter/material.dart';

class NotificationDialog {
  RiderDetails riderDetails=new RiderDetails();
  NotificationDialog(this.riderDetails);
  Widget dialog(BuildContext context){
    print("details:${riderDetails.drop_address}");
    return Container(
      child: Dialog(
        backgroundColor: Colors.white,
        shape: RoundedRectangleBorder(
          borderRadius: BorderRadius.circular(20),
        ),
        child: Container(
          height: 350,
          child: Column(
            children: [
              Padding(padding: const EdgeInsets.only(top: 20),
                  child: Image.asset("images/rider.jpg",width: 90,height: 50,fit: BoxFit.cover,)),
              Padding(padding: const EdgeInsets.only(top: 20,)
                ,child: Text("New Rider Request",style: TextStyle(color: Colors.black,
                    fontSize: 16,fontWeight: FontWeight.bold
                ),),),
              SizedBox(height: 20,),
              Row(
                children: [
                  Padding(padding: const EdgeInsets.only(left: 15),
                      child: Image.asset("images/pickicon.png",width: 40,height: 40,fit: BoxFit.cover,)),
                  Padding(padding: EdgeInsets.only(left: 15),
                    child: Text("${riderDetails.pick_address}",
                        style: TextStyle(
                            fontSize: 16,fontWeight: FontWeight.bold
                            ,color: Colors.grey[600]
                        )),
                  )
                ],
              ),
              SizedBox(height: 20,),
              Row(
                children: [
                  Padding(padding: const EdgeInsets.only(left: 15),
                      child: Image.asset("images/desticon.png",width: 40,height: 40,fit: BoxFit.cover,)),
                  Padding(padding: EdgeInsets.only(left: 15),
                    child: Text("${riderDetails.drop_address}",
                        style: TextStyle(
                            fontSize: 16,fontWeight: FontWeight.bold
                            ,color: Colors.grey[600]
                        )),
                  )
                ],
              )
              ,SizedBox(height: 20,),
              Divider(height: 1,thickness: 2,color: Colors.grey,),
          SizedBox(height: 20,),
              Row(
                mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                children: [
                  FlatButton(onPressed: (){
                    audioplayer.stop();
                    Navigator.pop(context);
                  }, child: Text("Cancel",style: TextStyle(
                      color: Colors.white,fontSize: 15
                  ),),shape: RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(20),
                      side: BorderSide(color: Colors.grey,width: 1)
                  ),color: Colors.red,),
                  FlatButton(onPressed: (){
                    audioplayer.stop();
                    checkavailablity(context);
                    Navigator.push(context,
                    MaterialPageRoute(builder: (context)=>NewRiderScreen(riderDetails: riderDetails,)));
                  }, child: Text("Accept",style: TextStyle(
                      color: Colors.white,fontSize: 15
                  ),),shape: RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(20),
                      side: BorderSide(color: Colors.grey,width: 1)
                  ),color: Colors.green,)
                ],
              ),
            ],
          ),
        ),
      ),
    );
  }
  void checkavailablity(context){
    Navigator.pop(context);
    String theriderId="";
    tripRequestref.once()
    .then((DataSnapshot dataSnapshot){
  if(dataSnapshot!=null){
    theriderId=dataSnapshot.value.toString();
  }else{
   // showToast("the ride is not exist", context);
  }
  if(theriderId==riderDetails.ride_request_id){
    tripRequestref.set("accepted");
    AssitanceMethods.disableHomeUpdatelocation();
  }else if(theriderId=="cancelled"){
    showToast("The rider has been cancelled", context);
  }else if(theriderId=="timeout"){
    showToast("the rider has timeout", context);
  }else{
    showToast("the ride is not exists....", context);
  }
    });
  }
}
