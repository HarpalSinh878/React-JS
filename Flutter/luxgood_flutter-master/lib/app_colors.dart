import 'package:flutter/material.dart';
import 'package:fluttertoast/fluttertoast.dart';

class AppColors{
  static const Color primaryColor = Color(0xFFFE9421);
  static const Color secondaryColor = Color(0xFF794A2C);
  static const Color grey = Color(0xFF939393);
  static const Color grey1 = Color(0xFFBCBCBC);
  static const Color white = Color(0xFFFFFFFF);
  static const Color black = Color(0xFF000000);
  static const Color switchOn = Color(0xFF34DB0F);
  static const Color switchOff = Color(0xFFEE0808);
  static const Color MapBox_Color = Color(0xFF3D64C5);

}

showLongToast(String s) {
  Fluttertoast.showToast(
    msg: s,
    toastLength: Toast.LENGTH_LONG,
  );
}
