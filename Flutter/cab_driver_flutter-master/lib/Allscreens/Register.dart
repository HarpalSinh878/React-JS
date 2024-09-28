import 'package:cabdriver/AllWidget/configMap.dart';
import 'package:cabdriver/AllWidget/progressDialog.dart';
import 'package:cabdriver/Allscreens/LoginScreen.dart';
import 'package:cabdriver/Allscreens/carInfoScreen.dart';
import 'package:cabdriver/general/appconstant.dart';
import 'package:cabdriver/main.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:flutter/material.dart';
import 'package:fluttertoast/fluttertoast.dart';

import 'mainScreen.dart';

class RegisterScreen  extends StatefulWidget {
  static const String idscreen="RegisterScreen";
  @override
  _State createState() => _State();
}

class _State extends State<RegisterScreen> {
  TextEditingController emailController=new TextEditingController();
  TextEditingController passController=new TextEditingController();
  TextEditingController namecontroller=new TextEditingController();
  TextEditingController phoncontroller=new TextEditingController();
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
              Image(image:AssetImage("images/driver.png"),width: 220,height: 210,)
              ,SizedBox(height: 10,),
              Text("Register As Driver",style: TextStyle(color: Colors.black,fontSize: 17),),
              SizedBox(height: 10,),
              TextField(
                controller: emailController,
                keyboardType: TextInputType.emailAddress,
                decoration: InputDecoration(
                    labelText: "Email",
                    hintStyle:TextStyle(color: Colors.grey,fontSize: 18,
                        fontFamily: "Bolt-Semibold")
                ),
              ),SizedBox(height: 10,),
              TextField(
                controller: namecontroller,
                keyboardType: TextInputType.emailAddress,
                decoration: InputDecoration(
                    labelText: "Name",
                    hintStyle:TextStyle(color: Colors.grey,fontSize: 18,
                        fontFamily: "Bolt-Semibold")
                ),
              ),SizedBox(height: 10,),
              TextField(
                controller: phoncontroller,
                keyboardType: TextInputType.emailAddress,
                decoration: InputDecoration(
                    labelText: "Contact Number",
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
                    }else if(namecontroller.text.length<3){
                      showToast("Please your name contain atleast 3 letter", context);
                    }else if(passController.text.length<5){
                      showToast("Please your name contain atleast 5 letter", context);
                    }else if(passController.text.isEmpty){
                      showToast("Please your contact", context);
                    }else{
                      registerNewuser(context);
                    }
                  }
                  ,child: Text("Resister",style:TextStyle(color: Colors.white,fontSize: 18.0) ,),),
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
                    Navigator.pushNamedAndRemoveUntil(context, LoginScreen.idscreen, (route) => false);
                  }
                  ,child: Text("Already do you have an account? Login",style:
                TextStyle(color: Colors.grey,fontSize: 15.0) ,),),
              )
            ],
          ),
        ),
      ),
    );
  }
 final FirebaseAuth auth=FirebaseAuth.instance;
   registerNewuser(BuildContext context) async {
     showDialog(context: context,
       barrierDismissible: false,
       builder: (BuildContext context){
       return ProgressDialog(message: "Please wait while creating account");
       });

    final User firebaseuser=(await auth.createUserWithEmailAndPassword(
        email: emailController.text, password: passController.text).
    catchError((errorMsg){
      Navigator.pop(context);
      showToast("Error:"+errorMsg.toString(), context);
    })).user;
    if(firebaseuser!=null){
      Map<String,String> user={
        "name":namecontroller.text.trim(),
        "phone":phoncontroller.text.trim(),
         "email":emailController.text.trim()
      };
      driverRef.child(firebaseuser.uid).set(user);
      currentfirebaseuser=firebaseuser;
      showToast("Congratulations you has been register successfully", context);
      Navigator.pushNamedAndRemoveUntil(context, CarinfoScreen.idscreen, (route) => false);
    }else{
      Navigator.pop(context);
      showToast("Congratulations you has not been  created", context);
    }
  }
}
showToast(String message,BuildContext context){
 Fluttertoast.showToast(msg: message);
}