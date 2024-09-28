import 'package:cabdriver/DataHandler/Address.dart';
import 'package:flutter/material.dart';

class AppData extends ChangeNotifier{
 Address pickloation,dropoffLocation;
 void updateLocation(Address updatalocation){
   pickloation=updatalocation;
   notifyListeners();
 }
 void updatedropOffLocation(Address updatadropOfflocation){
   dropoffLocation=updatadropOfflocation;
   notifyListeners();
 }
}