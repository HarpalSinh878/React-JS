import 'package:cabdriver/Allscreens/LoginScreen.dart';
import 'package:cabdriver/general/appconstant.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:flutter/material.dart';

class Profiletabpages extends StatefulWidget {
  @override
  ProfiletabpagesState createState() => ProfiletabpagesState();
}

class ProfiletabpagesState extends State<Profiletabpages> {
  @override
  Widget build(BuildContext context) {
    return Center(
      child:Container(
        width: double.maxFinite,
        margin: const EdgeInsets.symmetric(horizontal: 15),
        child: RaisedButton(
          shape: RoundedRectangleBorder(
              borderRadius: BorderRadius.circular(20)
          ),
          color:primaryColor,
          onPressed: (){
            FirebaseAuth.instance.signOut();
            /*if(!emailController.text.contains("@")){
              showToast("Please enter valid email", context);
            }else if(passController.text.isEmpty){
              showToast("Please enter password", context);
            }else{
              userLoggedIn(context);
            }

*/     Navigator.pop(context);
            Navigator.push(context, MaterialPageRoute(builder: (context)=>LoginScreen()));
          }
          ,child: Text("Logout",style:TextStyle(color: Colors.white,fontSize: 18.0) ,),),
      ),
    );
  }
}