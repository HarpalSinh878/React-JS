import 'dart:async';

import 'package:connectivity/connectivity.dart';
import 'package:get/get.dart';
import 'package:luxgood/models/groupStateModel.dart';
import 'package:luxgood/models/replayModel.dart';

import '../../app_colors.dart';
import '../../models/groupModel.dart';
import '../../services/api_repository.dart';

class GroupController extends GetxController {
  var index = 0.obs;
  var myList = List<GroupModel>.empty(growable: true).obs;

  StreamSubscription? subscription;
  var isoffline = false.obs;
  var isDataProcessing = false.obs;
  var isSwitch = false.obs;
  int selectIndex=0;
  int selectMenu=1;
  var perPage = 1;

  bool? checkNetwork() {
    subscription = Connectivity()
        .onConnectivityChanged
        .listen((ConnectivityResult result) {
      if (result == ConnectivityResult.none) {
        isoffline.value = true;
      } else if (result == ConnectivityResult.mobile) {
        isoffline.value = false;
      } else if (result == ConnectivityResult.wifi) {
        isoffline.value = false;
      } else {
        Get.snackbar("Network Error", "Failed to get network connection");
        isoffline.value = true;
      }
    });
  }

  @override
  void onInit() {
    // TODO: implement onInit
    checkNetwork();
    getAllRelays();
    super.onInit();
  }

  Future<void>  getGroupStatus() async {
    for(int i=0;i<myList.length;i++){
        GroupStateModel? value =await get_SerialNumbersRelayStates(myList[i].id);
        if(value!=null) {
          myList[i].state = value.groupStatus;
        }
      }
    update();
  }
  Future<void> getAllRelays() async {
    try {
        isDataProcessing.value = true;
        await get_AllRelayBoardG(selectMenu).then((resp) {
          isDataProcessing.value = false;
          if(resp!=null) {
            myList.clear();
            myList.addAll(resp);
            // getGroupStatus();
          }
        }, onError: (err) {
          showLongToast(err.toString());
        });
    } catch (e) {
      showLongToast(
        e.toString(),
      );
    }
  }

  Future<bool?> updateFireRelayGroup(
      int index, String id, bool state) async {
    try {
      selectIndex = index;
      isSwitch.value = true;
      await update_fireRelayGroup(id, state).then((resp) {
        isSwitch.value = false;
        if(resp!=null) {
          return resp;
        }
      }, onError: (err) {
        showLongToast(err.toString());
      });
    } catch (e) {
      showLongToast(
        e.toString(),
      );
    }
  }
}
