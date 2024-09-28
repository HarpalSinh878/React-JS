import 'dart:async';

import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:luxgood/view/groups/groups.dart';
import 'package:shared_preferences/shared_preferences.dart';

import '../../Constants.dart';
import '../../app_colors.dart';
import '../auth/signin.dart';
import '../relays/relay.dart';

class Home extends StatefulWidget {
  Home({Key? key}) : super(key: key);

  @override
  _HomeState createState() => _HomeState();
}

class _HomeState extends State<Home> {
  int selectMenu = 0;

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        backgroundColor: AppColors.primaryColor,
        title: Text(Constant.AppName),
      ),
      drawer: Drawer(
        child: ListView(
          padding: EdgeInsets.zero,
          children: [
            DrawerHeader(
              decoration: BoxDecoration(
                color: AppColors.primaryColor,
              ),
              child: Text(
                Constant.AppName,
                style: TextStyle(
                    fontSize: 24,
                    fontWeight: FontWeight.bold,
                    color: Colors.white),
              ),
            ),
            ListTile(
              title: Text(
                "Relay",
                style: TextStyle(
                    fontSize: 18,
                    color: selectMenu == 0
                        ? AppColors.primaryColor
                        : AppColors.black),
              ),
              onTap: () {
                setState(() {
                  selectMenu = 0;
                });
                Get.back();
              },
            ),
            ListTile(
              title: Text(
                "Groups",
                style: TextStyle(
                    fontSize: 18,
                    color: selectMenu == 1
                        ? AppColors.primaryColor
                        : AppColors.black),
              ),
              onTap: () {
                setState(() {
                  selectMenu = 1;

                });
                Get.back();
              },
            ),
            ListTile(
              title: Text(
                "Logout",
                style: TextStyle(fontSize: 18),
              ),
              onTap: () {
                logout(context);
                Get.back();
              },
            ),
          ],
        ),
      ),
      body: ListView(
        shrinkWrap: true,
        physics: const ClampingScrollPhysics(),
        children: [
          Padding(
            padding: const EdgeInsets.all(10.0),
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Text(
                  "relaytitle".tr,
                  style: TextStyle(fontWeight: FontWeight.bold, fontSize: 20),
                ),
                Text(
                  "",
                  style: TextStyle(
                      fontWeight: FontWeight.normal, color: Colors.grey),
                ),
              ],
            ),
          ),
          selectMenu==0?Relay():Group()
        ],
      ),
    );
  }

  logout(context) async {
    final pref = await SharedPreferences.getInstance();
    showDialog(
      context: context,
      builder: (BuildContext context) => CupertinoAlertDialog(
        title: Text("logs".tr),
        content: Text("logt".tr),
        actions: [
          CupertinoDialogAction(
              onPressed: () {
                Get.back();
              },
              isDefaultAction: true,
              child: Text("cancel".tr)),
          CupertinoDialogAction(
              onPressed: () {
                setState(() {
                  // Constant.access_token = "";
                  pref.setString("email", "");
                  pref.setString("password", "");
                  pref.setString("accessToken", "");
                  pref.setBool("isLogin", false);
                });
                Get.offAll(SignIn());
              },
              isDefaultAction: true,
              child: Text(
                "logout".tr,
                style: TextStyle(color: AppColors.black),
              ))
        ],
      ),
    );
  }
}
