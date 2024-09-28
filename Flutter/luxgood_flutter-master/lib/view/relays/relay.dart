import 'dart:async';

import 'package:flutter/material.dart';
import 'package:flutter_switch/flutter_switch.dart';
import 'package:get/get.dart';

import '../../app_colors.dart';
import '../../controller/home/homeController.dart';

class Relay extends StatefulWidget {
  const Relay({Key? key}) : super(key: key);

  @override
  _GroupState createState() => _GroupState();
}

class _GroupState extends State<Relay> {
  final myController = Get.put(HomeController());
  var isclick = false;

  var time;

  @override
  void initState() {
    // TODO: implement initState
    getData();
    super.initState();
  }

  getData() {
    time = Timer.periodic(
        Duration(seconds: 10), (Timer t) => myController.getAllRelays());
  }

  @override
  void dispose() {
    // TODO: implement dispose
    time.cancel();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    return Obx(
      () => myController.isoffline.value
          ? Center(
              child: Text('connectionerror'.tr),
            )
          : myController.myList.length == 0
              ? Center(
                  child: CircularProgressIndicator(),
                )
              : GridView.builder(
                  padding: EdgeInsets.all(8),
                  shrinkWrap: true,
                  physics: const ClampingScrollPhysics(),
                  gridDelegate: const SliverGridDelegateWithFixedCrossAxisCount(
                      crossAxisCount: 3,
                      crossAxisSpacing: 2,
                      mainAxisSpacing: 2,
                      childAspectRatio: 0.999999),
                  itemCount: myController.myList.length,
                  itemBuilder: (BuildContext, index) {
                    final item = myController.myList[index];
                    return Card(
                      color: AppColors.white.withOpacity(0.8),
                      elevation: 1,
                      shape: RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(12),
                      ),
                      child: Container(
                        padding: EdgeInsets.all(8),
                        child: Column(
                          crossAxisAlignment: CrossAxisAlignment.start,
                          children: [
                            Expanded(
                              flex: 0,
                              child: Row(
                                mainAxisAlignment:
                                    MainAxisAlignment.spaceBetween,
                                children: [
                                  SizedBox(
                                    height: 30,
                                    child: CircleAvatar(
                                      backgroundColor: !item.state
                                          ? AppColors.switchOn
                                          : AppColors.black,
                                      child: Image.asset(
                                          "assets/icons/icon.png",
                                          scale: 1.5),
                                    ),
                                  ),
                                  AbsorbPointer(
                                    absorbing: isclick,
                                    child: FlutterSwitch(
                                      height: 25,
                                      width: 45,
                                      value: !item.state,
                                      borderRadius: 30.0,
                                      inactiveTextColor: AppColors.grey,
                                      inactiveTextFontWeight: FontWeight.normal,
                                      activeTextFontWeight: FontWeight.normal,
                                      valueFontSize: 6,
                                      activeColor: AppColors.white,
                                      inactiveColor: AppColors.white,
                                      padding: 1.0,
                                      activeIcon: Image.asset(
                                        "assets/icons/sun.png",
                                        scale: 0.7,
                                      ),
                                      inactiveIcon: Image.asset(
                                        "assets/icons/moon.png",
                                        scale: 1.2,
                                      ),
                                      onToggle: (val) {
                                        setState(() {
                                          isclick = !isclick;
                                        });
                                        myController
                                            .updateFireRelay(index, item.name,
                                                item.relayNumber, !val)
                                            .then((value) => setState(() {
                                                  item.state = !item.state;
                                                  isclick = !isclick;
                                                }));
                                      },
                                    ),
                                  ),
                                ],
                              ),
                            ),
                            myController.selectIndex == index &&
                                    myController.isSwitch.value
                                ? Center(
                                    child: SizedBox(
                                      height: 20,
                                      width: 20,
                                      child: CircularProgressIndicator(),
                                    ),
                                  )
                                : Container(),
                            Expanded(
                              flex: 1,
                              child: Column(
                                mainAxisAlignment: MainAxisAlignment.end,
                                crossAxisAlignment: CrossAxisAlignment.start,
                                children: [
                                  Text(
                                    item.name,
                                    style: TextStyle(
                                        fontWeight: FontWeight.bold,
                                        fontSize: 15),
                                  ),
                                  Text(
                                    !item.state ? "on".tr : "off".tr,
                                    style: TextStyle(
                                        fontWeight: FontWeight.normal,
                                        color: AppColors.grey1,
                                        fontSize: 14),
                                  ),
                                ],
                              ),
                            ),
                          ],
                        ),
                      ),
                    );
                  },
                ),
    );
  }
}
