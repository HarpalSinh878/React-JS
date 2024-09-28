import 'dart:convert';
import 'dart:io';
import 'package:dio/dio.dart';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:shared_preferences/shared_preferences.dart';
import '../Constants.dart';
import '../app_colors.dart';
import '../models/groupModel.dart';
import '../models/groupStateModel.dart';
import '../models/loginModel.dart';
import '../models/relayBoardModel.dart';
import '../models/replayModel.dart';

Future<List<RelaysModel>?> get_AllRelayBoard(int menuId) async {
  SharedPreferences pref = await SharedPreferences.getInstance();
  try {
    var headers = {
      'authenticationKey': pref.getString("authenticationKey") ?? "",
      'Content-Type': 'application/json',
      'Accept': '*/*'
    };
    var request = http.Request('POST', Uri.parse(Constant.getAllRelayBoard));
    request.body = json.encode({});
    request.headers.addAll(headers);
    final response = await request.send();
    final respStr = await response.stream.bytesToString();
    final jsonBody = await jsonDecode(respStr);

    // print("+++++++++++");
    // print(jsonBody.toString());
    if (response.statusCode == 200) {
      List<dynamic> jsonbody1 = jsonBody['list'];
      List<RelayBoardModel> list = RelayBoardModel.getListFromJson(jsonbody1);
      return get_AllRelays(list[0].id);
    } else if (response.statusCode == 401) {
      await getRefreshToken();
      await get_AllRelayBoard(menuId);
    } else if (response.statusCode == 502) {
      showLongToast("Oops: Server Not Working");
    } else {
      showLongToast("Oops");
    }
  } catch (e) {
    if (e is SocketException) showLongToast("Could not connect to internet");
  }
  return null;
}

Future<List<GroupModel>?> get_AllRelayBoardG(int menuId) async {
  SharedPreferences pref = await SharedPreferences.getInstance();
  try {
    var headers = {
      'authenticationKey': pref.getString("authenticationKey") ?? "",
      'Content-Type': 'application/json',
      'Accept': '*/*'
    };
    var request = http.Request('POST', Uri.parse(Constant.getAllRelayBoard));
    request.body = json.encode({});
    request.headers.addAll(headers);
    final response = await request.send();
    final respStr = await response.stream.bytesToString();
    final jsonBody = await jsonDecode(respStr);

    // print("+++++++++++");
    // print(jsonBody.toString());
    if (response.statusCode == 200) {
      List<dynamic> jsonbody1 = jsonBody['list'];
      List<RelayBoardModel> list = RelayBoardModel.getListFromJson(jsonbody1);
      return get_AllRelaysGroup(list[0].id);
    } else if (response.statusCode == 401) {
      await getRefreshToken();
      await get_AllRelayBoard(menuId);
    } else if (response.statusCode == 502) {
      showLongToast("Oops: Server Not Working");
    } else {
      showLongToast("Oops");
    }
  } catch (e) {
    if (e is SocketException) showLongToast("Could not connect to internet");
  }
  return null;
}

Future<List<RelaysModel>?> get_AllRelays(String relayBoardId) async {
  SharedPreferences pref = await SharedPreferences.getInstance();
  try {
    var headers = {
      'authenticationKey': pref.getString("authenticationKey") ?? "",
      'Content-Type': 'application/json',
      'Accept': '*/*'
    };
    var request = http.Request('POST', Uri.parse(Constant.getAllRelays));
    request.body = json.encode({"relayBoardId": relayBoardId});
    request.headers.addAll(headers);
    final response = await request.send();
    final respStr = await response.stream.bytesToString();
    final jsonBody = await jsonDecode(respStr);
    // print("+++++++++++");
    // print(jsonBody.toString());
    if (response.statusCode == 200) {
      List<dynamic> jsonbody1 = jsonBody['list'];
      List<RelaysModel> list = RelaysModel.getListFromJson(jsonbody1);
      return list;
    } else if (response.statusCode == 401) {
      await getRefreshToken();
      await get_AllRelays(relayBoardId);
    } else if (response.statusCode == 502) {
      showLongToast("Oops: Server Not Working");
      return null;
    } else {
      showLongToast("Oops");
      return null;
    }
  } catch (e) {
    if (e is SocketException) showLongToast("Could not connect to internet");
  }
  return null;
}

Future<List<GroupModel>?> get_AllRelaysGroup(String relayBoardId) async {
  SharedPreferences pref = await SharedPreferences.getInstance();
  try {
    var headers = {
      'authenticationKey': pref.getString("authenticationKey") ?? "",
      'Content-Type': 'application/json',
      'Accept': '*/*'
    };
    var request = http.Request('POST', Uri.parse(Constant.getAllRelaysGroups));
    request.body = json.encode({"relayBoardId": relayBoardId});
    request.headers.addAll(headers);
    final response = await request.send();
    final respStr = await response.stream.bytesToString();
    final jsonBody = await jsonDecode(respStr);
    if (response.statusCode == 200) {
      List<dynamic> jsonbody1 = jsonBody['list'];
      List<GroupModel> list = GroupModel.getListFromJson(jsonbody1);

      return list;
    } else if (response.statusCode == 401) {
      await getRefreshToken();
      await get_AllRelaysGroup(relayBoardId);
    } else if (response.statusCode == 502) {
      showLongToast("Oops: Server Not Working");
      return null;
    } else {
      showLongToast("Oops");
      return null;
    }
  } catch (e) {
    if (e is SocketException) showLongToast("Could not connect to internet");
  }
  return null;
}

Future<GroupStateModel?> get_SerialNumbersRelayStates(
    String relayGroupId) async {
  SharedPreferences pref = await SharedPreferences.getInstance();
  try {
    var headers = {
      'authenticationKey': pref.getString("authenticationKey") ?? "",
      'Content-Type': 'application/json',
      'Accept': '*/*'
    };
    var request = http.Request('PUT', Uri.parse(Constant.getStatus));
    request.body = json.encode({"relayGroupId": relayGroupId});
    request.headers.addAll(headers);
    final response = await request.send();
    final respStr = await response.stream.bytesToString();
    final jsonBody = await jsonDecode(respStr);
    print("+++++++++++eee");
    print(jsonBody.toString());
    if (response.statusCode == 200) {
      return GroupStateModel.fromJson(jsonBody);
    } else if (response.statusCode == 401) {
      await getRefreshToken();
      await get_SerialNumbersRelayStates(relayGroupId);
    } else if (response.statusCode == 502) {
      showLongToast("Oops: Server Not Working");
      return null;
    } else {
      showLongToast("Oops");
      return null;
    }
  } catch (e) {
    if (e is SocketException) showLongToast("Could not connect to internet");
  }
  return null;
}

Future<bool?> update_fireRelay(String id, int number, bool state) async {
  SharedPreferences pref = await SharedPreferences.getInstance();
  try {
    var headers = {
      'authenticationKey': pref.getString("authenticationKey") ?? "",
      'Content-Type': 'application/json',
      'Accept': 'application/json',
    };
    var request = http.Request('PUT', Uri.parse(Constant.fireRelayPath));
    request.body = json
        .encode({"relayId": id, "relayNumber": number, "relayState": state});

    request.headers.addAll(headers);

    final response = await request.send();
    final respStr = await response.stream.bytesToString();
    final jsonBody = await jsonDecode(respStr);

    print("+++++++++");
    print(jsonBody.toString());
    if (response.statusCode == 200) {
      final body = jsonBody;
      return body;
    } else if (response.statusCode == 401) {
      await getRefreshToken();
      await update_fireRelay(id, number, state);
    } else if (response.statusCode == 502) {
      showLongToast("Oops: Server Not Working");
      return null;
    } else {
      // showLongToast("Oops");
      return null;
    }
  } catch (e) {
    if (e is SocketException) showLongToast("Could not connect to internet");
  }
}

Future<bool?> update_fireRelayGroup(String id, bool state) async {
  SharedPreferences pref = await SharedPreferences.getInstance();
  try {
    var headers = {
      'authenticationKey': pref.getString("authenticationKey") ?? "",
      'Content-Type': 'application/json',
      'Accept': 'application/json',
    };
    var request = http.Request('PUT', Uri.parse(Constant.fireRelayGroup));
    request.body = json.encode({"relayGroupId": id, "relayState": state});

    request.headers.addAll(headers);

    final response = await request.send();
    final respStr = await response.stream.bytesToString();
    final jsonBody = await jsonDecode(respStr);

    print("+++++++++++"+id);
    print(jsonBody.toString());
    if (response.statusCode == 200) {
      final body = jsonBody;
      return body;
    } else if (response.statusCode == 401) {
      await getRefreshToken();
      await update_fireRelayGroup(id, state);
    } else if (response.statusCode == 502) {
      showLongToast("Oops: Server Not Working");
      return null;
    } else {
      // showLongToast("Oops");
      return null;
    }
  } catch (e) {
    if (e is SocketException) showLongToast("Could not connect to internet");
  }
}

Future getRefreshToken() async {
  SharedPreferences pref = await SharedPreferences.getInstance();

  try {
    final data = {
      "email": pref.getString("email"),
      "password": pref.getString("password"),
      "secondsValid": 26202870
    };

    final dio = Dio();
    dio.options.connectTimeout = 5000; //5s
    dio.options.receiveTimeout = 3000;
    Response response = await dio.post(Constant.loginPath, data: data);
    if (response.statusCode == 200) {
      final body = response.data;
      Constant.authenticationKey = body['authenticationKey'].toString();
      pref.setBool("isLogin", true);
      pref.setString("authenticationKey", body['authenticationKey'].toString());
      return LoginModel.fromJson(body);
    } else if (response.statusCode == 502) {
      showLongToast("Oops: Server Not Working");
    } else {
      return null;
    }
  } on DioError catch (e) {
    print(e);
  } catch (e) {
    if (e is SocketException) showLongToast("Could not connect to internet");
  }
}
