import 'dart:async';

import 'package:cabdriver/DataHandler/DriverInfo.dart';
import 'package:cabdriver/DataHandler/Userinfo.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:geolocator/geolocator.dart';
import 'package:just_audio/just_audio.dart';

//String mapkey="AIzaSyDH6NoMpGfuSOKzb5eSynC2FePhrhzrtTU";
String mapkey="AIzaSyDi2Q098E82Zl8PrReTL2eY9vh5xhsNFHQ";

User firebaseuser;
Users currentUserInfo;
User currentfirebaseuser;
StreamSubscription<Position>homeTagsubscription;
StreamSubscription<Position>riderTagsubscription;
final audioplayer=AudioPlayer();
Position currentposion;
Drivers driversInfo;
