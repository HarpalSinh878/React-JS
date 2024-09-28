import 'package:cabdriver/AllWidget/configMap.dart';
import 'package:cabdriver/AllWidget/progressDialog.dart';
import 'package:cabdriver/Allscreens/Register.dart';
import 'package:cabdriver/Allscreens/mainScreen.dart';
import 'package:cabdriver/general/appconstant.dart';
import 'package:cabdriver/main.dart';
import 'package:cabdriver/Allscreens/Register.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:firebase_database/firebase_database.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';

class LoginScreen extends StatefulWidget{
  static const String idscreen="LoginScreen";
  @override
  Loginstate  createState() {
    // TODO: implement createState
    return Loginstate();
  }


}
class Loginstate extends State<LoginScreen>{
  TextEditingController emailController=new TextEditingController();
  TextEditingController passController=new TextEditingController();

  @override
  Widget build(BuildContext context) {
    // TODO: implement build
    return Scaffold(
      body: Container(
        height: double.maxFinite,
        margin: const EdgeInsets.symmetric(horizontal: 15,vertical: 90),
        child: SingleChildScrollView(
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              SizedBox(height: 35.0,),
              Image(image:AssetImage("images/driver.png"),width: 220,height: 210,)
              ,SizedBox(height: 10,),
              Text("Login As Driver",style: TextStyle(color: Colors.black,fontSize: 17),),
              SizedBox(height: 10,),
              SizedBox(height: 10,),
              TextField(
                controller: emailController,
                keyboardType: TextInputType.emailAddress,
                decoration: InputDecoration(
                    labelText: "Email",
                    hintStyle:TextStyle(color: Colors.grey,fontSize: 18,
                        fontFamily: "Bolt-Semibold")
                ),
              ),
              SizedBox(height: 5.0,),
              TextField(
                controller: passController,
                obscureText: true,
                decoration: InputDecoration(
                    labelText: "Password",
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
                  color:primaryColor,
                  onPressed: (){
                    if(!emailController.text.contains("@")){
                      showToast("Please enter valid email", context);
                    }else if(passController.text.isEmpty){
                      showToast("Please enter password", context);
                    }else{
                      userLoggedIn(context);
                    }

                  }
                  ,child: Text("Login",style:TextStyle(color: Colors.white,fontSize: 18.0) ,),),
              ),
              SizedBox(height: 5.0,),
              Container(
                width: double.maxFinite,
                margin: const EdgeInsets.symmetric(horizontal: 15),
                child: FlatButton(
                  shape: RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(20)
                  ),
                  onPressed: (){
                    Navigator.pushNamedAndRemoveUntil(context, RegisterScreen.idscreen, (route) => false);
                  }
                  ,child: Text("Don't you have an account? Register",style:
                TextStyle(color: Colors.grey,fontSize: 15.0) ,),),
              )
            ],
          ),
        ),
      ),
    );
  }
  final FirebaseAuth auth=FirebaseAuth.instance;
  void userLoggedIn(BuildContext context) async{
    showDialog(context: context,
        barrierDismissible: false,
        builder: (BuildContext context){
          return ProgressDialog(message: "Please wait Authentication..",);
        }
    );
    final User firebaseuser=(await auth.signInWithEmailAndPassword(
        email: emailController.text, password: passController.text)
        .catchError((errorMsg){
      Navigator.of(context);
      showToast("Error:"+errorMsg.toString(), context);
    }).whenComplete((){

    })).user;
    if(firebaseuser!=null){
      driverRef.child(firebaseuser.uid)
          .once().then((DataSnapshot  snapshot) {
        if(snapshot!=null){
          currentfirebaseuser=firebaseuser;
          showToast("your are loggedIn", context);
          Navigator.pushReplacement(context, MaterialPageRoute(builder:
              (context)=>MainScreen()));
        }else{
          auth.signOut();
          showToast("no user exits please create user", context);
        }
      });
    }else{
      Navigator.of(context);
      showToast("error occured please  check it", context);
    }
  }
}