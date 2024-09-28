
import 'package:cabdriver/Tabpages/HomeTabpages.dart';
import 'package:cabdriver/Tabpages/Profiletabs.dart';
import 'package:cabdriver/Tabpages/Ratingtabs.dart';
import 'package:cabdriver/Tabpages/earningTabls.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';

class MainScreen extends StatefulWidget {
  static const String idscreen="MainScreen";
  @override
  MainState createState() {
    // TODO: implement createState
    return MainState();
  }

}

class MainState extends State<MainScreen> with SingleTickerProviderStateMixin{
  TabController tabcontroller;
  int selectedindx=0;
  void onItemtap(int index){
    setState(() {
      selectedindx=index;
      tabcontroller.index=selectedindx;
    });
  }
  @override
  void dispose() {
    // TODO: implement dispose
    super.dispose();
    tabcontroller.dispose();
  }
  @override
  void initState() {
    // TODO: implement initState
    super.initState();
    tabcontroller=TabController(length: 4, vsync: this);
  }
  @override
  Widget build(BuildContext context) {
    // TODO: implement build
    return Scaffold(
       body: TabBarView(
         physics: NeverScrollableScrollPhysics(),
          controller: tabcontroller,
          children: [
            Hometabspage(),
            EarningTabspage(),
            RatingTabspage(),
            Profiletabpages()
          ],
       ),
      bottomNavigationBar: BottomNavigationBar(selectedFontSize: 14,
      selectedItemColor: Colors.yellow,
        showUnselectedLabels: true,
        unselectedItemColor: Colors.black,
        onTap: onItemtap,
        currentIndex: selectedindx,
        items:<BottomNavigationBarItem> [
        BottomNavigationBarItem(icon: Icon(Icons.home),label: "Home"),
        BottomNavigationBarItem(icon: Icon(Icons.money),label: "Earning"),
        BottomNavigationBarItem(icon: Icon(Icons.star),label: "Rating"),
        BottomNavigationBarItem(icon: Icon(Icons.person),label: "Profile"),

      ],),
    );
  }

}