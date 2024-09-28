import 'dart:async';

import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter/material.dart';
import 'package:flutter_switch/flutter_switch.dart';
import 'package:get/get.dart';
import 'package:luxgood/controller/home/homeController.dart';
import 'package:luxgood/models/replayModel.dart';
import 'package:luxgood/services/api_repository.dart';

import '../../app_colors.dart';
import '../../controller/group/groupController.dart';

class Group extends StatefulWidget {
  const Group({Key? key}) : super(key: key);

  @override
  _GroupState createState() => _GroupState();
}

class _GroupState extends State<Group> {
  final myController = Get.put(GroupController());
  var isclick = false;

  @override
  void initState() {
    // TODO: implement initState
    getData();
    super.initState();
  }

  var time;

  getData() {
    time = Timer.periodic(
        Duration(seconds: 3), (Timer t){
          myController.getAllRelays();
        });
  }



  @override
  void dispose() {
    // TODO: implement dispose
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
              : ListView.builder(
                  padding: EdgeInsets.all(8),
                  shrinkWrap: true,
                  physics: const ClampingScrollPhysics(),
                  itemCount: myController.myList.length,
                  itemBuilder: (BuildContext, index) {
                    final item = myController.myList[index];
                    return ExpansionTile(
                      title: Row(
                        mainAxisAlignment: MainAxisAlignment.spaceBetween,
                        children: [
                          Text(item.name),
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
                          AbsorbPointer(
                            absorbing: isclick,
                            child: FlutterSwitch(
                              height: 25,
                              width: 45,
                              value: !item.relays[item.relays.length-1].state,
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
                                    .updateFireRelayGroup(
                                        index, item.id.toString(), !val)
                                    .then((value) => setState(() {
                                          item.relays[item.relays.length-1].state = !item.relays[item.relays.length-1].state;
                                          isclick = !isclick;
                                        }));
                              },
                            ),
                          ),
                        ],
                      ),
                      subtitle: Text(
                          "trelay".tr + " " + item.relays.length.toString()),
                      children: [
                        Container(
                          width: MediaQuery.of(context).size.width,
                          height: 150,
                          child: ListView.builder(
                            padding: EdgeInsets.all(8),
                            shrinkWrap: true,
                            scrollDirection: Axis.horizontal,
                            physics: const ClampingScrollPhysics(),
                            itemCount: item.relays.length,
                            itemBuilder: (BuildContext, index) {
                              final item1 = item.relays[index];
                              return Card(
                                color: AppColors.white.withOpacity(0.8),
                                elevation: 1,
                                shape: RoundedRectangleBorder(
                                  borderRadius: BorderRadius.circular(12),
                                ),
                                child: Container(
                                  height: 100,
                                  width: 110,
                                  padding: EdgeInsets.all(8),
                                  child: Column(
                                    crossAxisAlignment:
                                        CrossAxisAlignment.start,
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
                                                backgroundColor: !item1.state
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
                                                value: !item1.state,
                                                borderRadius: 30.0,
                                                inactiveTextColor:
                                                    AppColors.grey,
                                                inactiveTextFontWeight:
                                                    FontWeight.normal,
                                                activeTextFontWeight:
                                                    FontWeight.normal,
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
                                                onToggle: (val) {},
                                              ),
                                            ),
                                          ],
                                        ),
                                      ),
                                      Expanded(
                                        flex: 1,
                                        child: Column(
                                          mainAxisAlignment:
                                              MainAxisAlignment.end,
                                          crossAxisAlignment:
                                              CrossAxisAlignment.start,
                                          children: [
                                            Text(
                                              item1.name,
                                              style: TextStyle(
                                                  fontWeight: FontWeight.bold,
                                                  fontSize: 15),
                                            ),
                                            Text(
                                              !item1.state ? "on".tr : "off".tr,
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
                        )
                      ],
                    );
                  }),
    );
  }
}
