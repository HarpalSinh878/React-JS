
import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:get/get.dart';
import 'package:luxgood/app_colors.dart';
import 'package:shared_preferences/shared_preferences.dart';

import '../../Constants.dart';
import '../../controller/home/homeController.dart';
import '../auth/signin.dart';
import '../home/home.dart';

class MainPage extends StatefulWidget {
  MainPage({Key? key}) : super(key: key);

  @override
  _MainPageState createState() => _MainPageState();
}

class _MainPageState extends State<MainPage> {
  var islogin = false;
  late SharedPreferences pref;

  @override
  void initState() {
    // TODO: implement initState
    super.initState();
    getSharedPref();

  }
  getSharedPref() async {
    pref = await SharedPreferences.getInstance();

    setState(() {
      Constant.authenticationKey=(pref.getString("authenticationKey"))??"";
      islogin=(pref.getBool("isLogin"))??false;
      debugPrint(pref.getString("authenticationKey"));
      if(islogin){
        Get.offAll(Home());
      }
      else{
        Get.offAll(SignIn());
      }
    });

  }

  @override
  Widget build(BuildContext context) {
    SystemChrome.setPreferredOrientations([DeviceOrientation.portraitUp]);
    return Scaffold(
        backgroundColor: AppColors.white,
        body: Center(child: CircularProgressIndicator(),));
  }
}