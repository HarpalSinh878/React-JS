import 'dart:convert';
import 'package:http/http.dart'as http;
import 'package:dio/dio.dart';
import 'package:luxgood/Constants.dart';
import 'package:luxgood/interfaces/login_interface.dart';

import '../app_colors.dart';
import '../models/loginModel.dart';

class LoginService extends ILogin {


  @override
  Future<LoginModel?> login(String email, String password) async {
    try{
      final data = {
        "email": email,
        "password": password,
        "secondsValid": 26202870
      };

      final dio = Dio();
      dio.options.baseUrl = Constant.base_url;
      dio.options.connectTimeout = 5000; //5s
      dio.options.receiveTimeout = 3000;
      Response response;

      response = await dio.post(Constant.loginPath, data: data);
      if (response.statusCode == 200) {
        final body = response.data;
        return LoginModel.fromJson(body);
      } else if (response.statusCode == 502) {
        showLongToast("Oops: Server Not Working");
      }else {
        return null;
      }
    } on DioError catch (e) {
      print(e);
    } catch (e) {
      print(e);
    }

  }
  @override
  Future<LoginModel?> loginNew(String email, String password) async {
    try{

      var headers = {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        };
      var request = http.Request('POST', Uri.parse(Constant.loginPath));
      request.body = json.encode({
        "email": email,
        "password": password,
        "secondsValid": 26202870
      });
      request.headers.addAll(headers);
      final response = await request.send();
      final respStr = await response.stream.bytesToString();
      final jsonBody = await jsonDecode(respStr);
      if (response.statusCode == 200) {
        return LoginModel.fromJson(jsonBody);
      } else if (response.statusCode == 502) {
        showLongToast("Oops: Server Not Working");
      }else {
        return null;
      }
    } catch (e) {
      print(e);
    }

  }
}
