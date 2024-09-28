import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:luxgood/Constants.dart';
import 'package:luxgood/app_colors.dart';
import 'package:luxgood/models/loginModel.dart';
import 'package:luxgood/services/login_service.dart';
import 'package:luxgood/view/home/home.dart';
import 'package:shared_preferences/shared_preferences.dart';

import '../../interfaces/login_interface.dart';

class SignIn extends StatefulWidget {
  SignIn({Key? key}) : super(key: key);

  @override
  State<SignIn> createState() => _SignInState();
}

class _SignInState extends State<SignIn> {
  final ILogin _login = LoginService();

  final mailController = TextEditingController();
  final pwdController = TextEditingController();
  final formKey = GlobalKey<FormState>();

  late SharedPreferences pref;
  bool show = true;

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        backgroundColor: Colors.white,
        body: SingleChildScrollView(
          child: Container(
              height: MediaQuery.of(context).size.height,
              width: MediaQuery.of(context).size.width,
              padding: EdgeInsets.all(18),
              child: Stack(
                children: [
                  Container(
                      height: MediaQuery.of(context).size.height / 2 + 50,
                      width: MediaQuery.of(context).size.width,
                      decoration: const BoxDecoration(
                          image: DecorationImage(
                              image: AssetImage(
                                "assets/images/bg.png",
                              ),
                              scale: 1.2,
                          fit: BoxFit.fitHeight))),
                  Align(
                    alignment: Alignment.bottomCenter,
                    child: Form(
                      key: formKey,
                      child: Column(
                        mainAxisAlignment: MainAxisAlignment.end,
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          const SizedBox(
                            height: 15,
                          ),
                          Container(
                            decoration: BoxDecoration(
                              color: AppColors.white,
                              borderRadius: BorderRadius.circular(15),
                            ),
                            child: TextFormField(
                              controller: mailController,
                              decoration: InputDecoration(
                                contentPadding: EdgeInsets.only(right: 15),
                                hintText: "username".tr,
                                border: OutlineInputBorder(
                                  borderRadius: BorderRadius.circular(15.0),
                                  borderSide: const BorderSide(
                                      color: Colors.red, width: 2),
                                ),
                                focusedBorder: OutlineInputBorder(
                                  borderRadius: BorderRadius.circular(15.0),
                                  borderSide: const BorderSide(
                                      color: Colors.grey, width: 2),
                                ),
                                enabledBorder: OutlineInputBorder(
                                  borderRadius: BorderRadius.circular(15.0),
                                  borderSide: const BorderSide(
                                      color: Colors.grey, width: 2),
                                ),
                              ),
                            ),
                          ),
                          const SizedBox(
                            height: 20,
                          ),
                          Container(
                            decoration: BoxDecoration(
                              color: AppColors.white,
                              borderRadius: BorderRadius.circular(15),
                            ),
                            child: TextFormField(
                              controller: pwdController,
                              obscureText: show,
                              decoration: InputDecoration(
                                contentPadding: EdgeInsets.only(right: 15),
                                hintText: 'password'.tr,
                                suffixIcon: IconButton(
                                  onPressed: () {
                                    setState(() {
                                      show = !show;
                                    });
                                  },
                                  icon: show
                                      ? Image.asset(
                                          "assets/icons/eye.png",
                                          scale: 1.2,
                                        )
                                      : Image.asset(
                                          "assets/icons/eye-slash.png",
                                          scale: 1.2,
                                        ),
                                ),
                                border: OutlineInputBorder(
                                  borderRadius: BorderRadius.circular(15.0),
                                  borderSide: const BorderSide(
                                      color: Colors.red, width: 2),
                                ),
                                focusedBorder: OutlineInputBorder(
                                  borderRadius: BorderRadius.circular(15.0),
                                  borderSide: const BorderSide(
                                      color: Colors.grey, width: 2),
                                ),
                                enabledBorder: OutlineInputBorder(
                                  borderRadius: BorderRadius.circular(15.0),
                                  borderSide: const BorderSide(
                                      color: Colors.grey, width: 2),
                                ),
                              ),
                            ),
                          ),
                          const SizedBox(
                            height: 20,
                          ),
                          Center(
                              child: ClipOval(
                            child: InkWell(
                              onTap: () async {
                                pref = await SharedPreferences.getInstance();
                                if (formKey.currentState!.validate()) {
                                  LoginModel? user = await _login.loginNew(
                                      mailController.text, pwdController.text);
                                  if (user != null) {
                                    pref.setBool("isLogin", true);
                                    pref.setString("authenticationKey",
                                        user.authenticationKey);
                                    pref.setString(
                                        "email", mailController.text);
                                    pref.setString(
                                        "password", pwdController.text);
                                    Get.offAll(Home());
                                  }
                                }
                              },
                              child: Image.asset(
                                "assets/images/button.png",
                                scale: 0.9,
                              ),
                            ),
                          )),
                        ],
                      ),
                    ),
                  ),
                ],
              )),
        ));
  }
}
