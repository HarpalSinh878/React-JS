import 'package:cabdriver/AllWidget/configMap.dart';
import 'package:cabdriver/Allscreens/LoginScreen.dart';
import 'package:cabdriver/Allscreens/Register.dart';
import 'package:cabdriver/Allscreens/carInfoScreen.dart';
import 'package:cabdriver/Allscreens/mainScreen.dart';
import 'package:cabdriver/Allscreens/newRiderscreen.dart';
import 'package:cabdriver/DataHandler/Appdata.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:firebase_core/firebase_core.dart';
import 'package:firebase_database/firebase_database.dart';
import 'package:firebase_messaging/firebase_messaging.dart';
import 'package:flutter/material.dart';
import 'package:flutter_local_notifications/flutter_local_notifications.dart';
import 'package:provider/provider.dart';
import 'package:rxdart/subjects.dart';

FirebaseMessaging firebaseMessaging = new FirebaseMessaging();
final FlutterLocalNotificationsPlugin flutterLocalNotificationsPlugin =
    FlutterLocalNotificationsPlugin();
final BehaviorSubject<ReceivedNotification> didReceiveLocalNotificationSubject =
    BehaviorSubject<ReceivedNotification>();

final BehaviorSubject<String> selectNotificationSubject =
    BehaviorSubject<String>();
GlobalKey<NavigatorState> navigatorKey = GlobalKey<NavigatorState>();

Future initialize2() async {
  await firebaseMessaging.configure(
    onMessage: (Map<String, dynamic> message) {
      print('onmessage:' +
          message.toString() +
          "/${message['notification']["title"]}");
      if (message['notification']["title"] != null) {
        audioplayer.setAsset("sound/noti.mp3");
        audioplayer.setClip(
            start: Duration(seconds: 0), end: Duration(seconds: 60));
        audioplayer.play();
      }
      //retriveRiderId( getRiderId(message),context);
    },
    onBackgroundMessage: myBackgroundMessageHandler,
    onResume: (Map<String, dynamic> message) {
      print('onmResume:' + message.toString());
      if (message['notification']["title"] != null) {
        audioplayer.setAsset("sound/noti.mp3");
        audioplayer.setClip(
            start: Duration(seconds: 0), end: Duration(seconds: 60));
        audioplayer.play();
      }
      //retriveRiderId( getRiderId(message),context);
    },
    /* onLaunch:(Map<String,dynamic>message){
    print('onLaunch:'+message.toString());
    if(message['notification']["title"]!=null){
      audioplayer.setAsset("sound/noti.mp3");
      audioplayer.setClip(start:Duration(seconds: 0), end:Duration(seconds: 60));
      audioplayer.play();
    }
   // retriveRiderId( getRiderId(message),context);
  }*/
  );
}

class ReceivedNotification {
  ReceivedNotification({
    @required this.id,
    @required this.title,
    @required this.body,
    @required this.payload,
  });

  final int id;
  final String title;
  final String body;
  final String payload;
}

Future<dynamic> myBackgroundMessageHandler(Map<String, dynamic> message) {
  print("background:${message.values}");
  if (message['notification']["title"] != null) {
    audioplayer.setAsset("sound/noti.mp3");
    audioplayer.setClip(
        start: Duration(seconds: 0), end: Duration(seconds: 60));
    audioplayer.play();
    print('onbackground2:' + message.toString() + "/" + "${message.values}");
  }
  if (message.containsKey('data')) {
    // Handle data message
    final dynamic data = message['data'];
  }

  if (message.containsKey('notification')) {
    // Handle notification message
    final dynamic notification = message['notification'];
  }

  // Or do other work.
}

const AndroidNotificationChannel channel = AndroidNotificationChannel(
  'high_importance_channel', // id
  'High Importance Notifications', // title
  'This channel is used for important notifications.', // description
  importance: Importance.max,
);

void main() async {
  WidgetsFlutterBinding.ensureInitialized();
  await Firebase.initializeApp();
  currentfirebaseuser = FirebaseAuth.instance.currentUser;
  initialize2();
  await flutterLocalNotificationsPlugin
      .resolvePlatformSpecificImplementation<
          AndroidFlutterLocalNotificationsPlugin>()
      ?.createNotificationChannel(channel);

  final NotificationAppLaunchDetails notificationAppLaunchDetails =
      await flutterLocalNotificationsPlugin.getNotificationAppLaunchDetails();

  const AndroidInitializationSettings initializationSettingsAndroid =
      AndroidInitializationSettings('cover');
  final IOSInitializationSettings initializationSettingsIOS =
      IOSInitializationSettings(
          requestAlertPermission: false,
          requestBadgePermission: false,
          requestSoundPermission: false,
          onDidReceiveLocalNotification: (
            int id,
            String title,
            String body,
            String payload,
          ) async {
            didReceiveLocalNotificationSubject.add(
              ReceivedNotification(
                id: id,
                title: title,
                body: body,
                payload: payload,
              ),
            );
          });

  const MacOSInitializationSettings initializationSettingsMacOS =
      MacOSInitializationSettings(
    requestAlertPermission: false,
    requestBadgePermission: false,
    requestSoundPermission: false,
  );

  final InitializationSettings initializationSettings = InitializationSettings(
    android: initializationSettingsAndroid,
    iOS: initializationSettingsIOS,
    macOS: initializationSettingsMacOS,
  );

  runApp(MyApp());
  await flutterLocalNotificationsPlugin.initialize(initializationSettings,
      onSelectNotification: (String payload) async {
    if (payload != null) {
      debugPrint('notification payload: $payload');
    }
    selectedNotificationPayload = payload;
    selectNotificationSubject.add(payload);
  });
}

String selectedNotificationPayload;
DatabaseReference databaseReference =
    FirebaseDatabase.instance.reference().child("user");
DatabaseReference driverRef =
    FirebaseDatabase.instance.reference().child("drivers");
DatabaseReference tripRequestref = FirebaseDatabase.instance
    .reference()
    .child("drivers")
    .child(currentfirebaseuser.uid)
    .child("newRide");
DatabaseReference riderReuestref =
    FirebaseDatabase.instance.reference().child("rider");

class MyApp extends StatefulWidget {
  // This widget is the root of your application.
  @override
  State<MyApp> createState() => _MyAppState();
}

class _MyAppState extends State<MyApp> {
  AndroidNotificationChannel channel = AndroidNotificationChannel(
      'high_importance_channel', // id
      'High Importance Notifications', // title
      'This channel is used for important notifications.', // description
      importance: Importance.max,
      playSound: true,
      sound: RawResourceAndroidNotificationSound('noti'));
  final FlutterLocalNotificationsPlugin flutterLocalNotificationsPlugin =
      FlutterLocalNotificationsPlugin();

  @override
  void initState() {
    // TODO: implement initState
    var initializationSettingsAndroid =
        new AndroidInitializationSettings('cover');
    var initializationSettingsIOS = new IOSInitializationSettings(
        onDidReceiveLocalNotification: onDidRecieveLocalNotification);
    var initializationSettings = new InitializationSettings(
        android: initializationSettingsAndroid, iOS: initializationSettingsIOS);
    flutterLocalNotificationsPlugin.initialize(initializationSettings,
        onSelectNotification: onSelectNotification);
    firebaseMessaging.configure(onMessage: (Map<String, dynamic> notification) {
      if (notification != null) {
        print("noti:${notification['title']}/${notification['data']}");
        flutterLocalNotificationsPlugin.show(
          notification.hashCode,
          notification['notification']['title'],
          notification['notification']['title'],
          NotificationDetails(
            android: AndroidNotificationDetails(
              channel.id,
              channel.name,
              channel.description,
              icon: "cover",
              playSound: true,
              sound: RawResourceAndroidNotificationSound("noti"),
              fullScreenIntent: true,
              importance: Importance.max,
              priority: Priority.high,
              // other properties...
            ),
          ),
        );
      }
    });
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return ChangeNotifierProvider(
      create: (context) => AppData(),
      child: MaterialApp(
        title: 'Flutter Demo',
        debugShowCheckedModeBanner: false,
        theme: ThemeData(
          fontFamily: "Signatra",
          primarySwatch: Colors.blue,
          visualDensity: VisualDensity.adaptivePlatformDensity,
        ),
        initialRoute: FirebaseAuth.instance.currentUser == null
            ? LoginScreen.idscreen
            : MainScreen.idscreen,
        routes: {
          LoginScreen.idscreen: (context) => LoginScreen(),
          RegisterScreen.idscreen: (context) => RegisterScreen(),
          MainScreen.idscreen: (context) => MainScreen(),
          CarinfoScreen.idscreen: (context) => CarinfoScreen(),
          "newRider": (context) => NewRiderScreen()
        },
      ),
    );
  }

  Future onDidRecieveLocalNotification(
      int id, String title, String body, String payload) {}

  Future onSelectNotification(String payload) {}
}
