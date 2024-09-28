import 'package:cabdriver/AllWidget/configMap.dart';
import 'package:cabdriver/Allscreens/mainScreen.dart';
import 'package:cabdriver/main.dart';
import 'package:cabdriver/Allscreens/mainScreen.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';

import 'Register.dart';

class CarinfoScreen extends StatefulWidget {
  static String idscreen="carinfo";
  @override
  _CarinfoScreenState createState() => _CarinfoScreenState();
}

class _CarinfoScreenState extends State<CarinfoScreen> {
  TextEditingController carnameController=new TextEditingController();
  TextEditingController carnumberController=new TextEditingController();
  TextEditingController carColorController=new TextEditingController();
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Container(
        height: double.maxFinite,
        margin: const EdgeInsets.symmetric(horizontal: 15),
        child: SingleChildScrollView(
          scrollDirection: Axis.vertical,
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              SizedBox(height: 35.0,),
              Image(image:AssetImage("images/cover.jpg"),width: 220,height: 210,)
              ,SizedBox(height: 10,),
              Text("Enter Bike Details",style: TextStyle(color: Colors.black,fontSize: 17),),
              SizedBox(height: 10,),
              TextField(
                controller: carnameController,
                keyboardType: TextInputType.emailAddress,
                decoration: InputDecoration(
                    labelText: "Bike Name",
                    hintStyle:TextStyle(color: Colors.grey,fontSize: 18,
                        fontFamily: "Bolt-Semibold")
                ),
              ),SizedBox(height: 10,),
              TextField(
                controller:carnumberController,
                keyboardType: TextInputType.emailAddress,
                decoration: InputDecoration(
                    labelText: "Bike number",
                    hintStyle:TextStyle(color: Colors.grey,fontSize: 18,
                        fontFamily: "Bolt-Semibold")
                ),
              ),SizedBox(height: 10,),
              TextField(
                controller:carColorController ,
                keyboardType: TextInputType.emailAddress,
                decoration: InputDecoration(
                    labelText: "Bike color",
                    hintStyle:TextStyle(color: Colors.grey,fontSize: 18,
                        fontFamily: "Bolt-Semibold")
                ),
              ),

              SizedBox(height: 5.0,),
              Container(
                width: double.maxFinite,
                margin: const EdgeInsets.symmetric(horizontal: 15),
                child: RaisedButton(
                  shape: RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(20)
                  ),
                  color: Colors.red,
                  onPressed: (){
                    if(carnameController.text.isEmpty){
                      showToast("Please enter Bike name", context);
                    }else if(carColorController.text.isEmpty){
                      showToast("Please enter Bike color", context);
                    }else if(carnumberController.text.isEmpty){
                      showToast("Please Bike number", context);
                    }else{
                      savecarInfo(context);
                    }
                  }
                  ,child: Row(mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  children: [
                    Text("Next",style:TextStyle(color: Colors.white,fontSize: 18.0) ,),
                    Icon(Icons.arrow_forward,color: Colors.white,)
                  ],
                ),),
              ),
              SizedBox(height: 15.0,),
              Container(
                height: 60,
                width: double.maxFinite,
                margin: const EdgeInsets.symmetric(horizontal: 15),
                child: FlatButton(
                  shape: RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(20)
                  ),
                  onPressed: (){
                    Navigator.pushNamedAndRemoveUntil(context, MainScreen.idscreen, (route) => false);
                  }
                //   ,child: Text("Already do you have an account? Login",style:
                // TextStyle(color: Colors.grey,fontSize: 15.0) ,),),
                )
              )
            ],
          ),
        ),
      ),
    );
  }

  void savecarInfo(BuildContext context) {
    String urid=currentfirebaseuser.uid;
    Map carinfo={
      "car_name":carnameController.text,
      "car_number":carnumberController.text,
      "car_color":carColorController.text
    };
    driverRef.child(urid).child("car_details").set(carinfo);
    Navigator.pushNamedAndRemoveUntil(context, MainScreen.idscreen, (route) => false);
    showToast("Bike details saved successfully", context);
  }
}
