import 'package:flutter/material.dart';

class CollectAmuntfare extends StatelessWidget {
  String fareMethod="";
  int fareamount;
  CollectAmuntfare({this.fareamount,this.fareMethod});
  @override
  Widget build(BuildContext context) {
    return Dialog(
      backgroundColor: Colors.transparent,
      shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(15)),
      child: Container(
        decoration: BoxDecoration(
          borderRadius: BorderRadius.circular(20),
          color: Colors.white
        ),
        height: 220.0,
        width: double.maxFinite,
        padding: const EdgeInsets.only(left: 16,right: 16),
        margin: const EdgeInsets.only(left: 16,right: 15),
        child: Column(
          children: [SizedBox(height: 10,),
            Text("Trip Fare",style: TextStyle(color: Colors.grey,fontWeight: FontWeight.bold,
            fontSize: 16),),
            SizedBox(height: 20,),
            Text("\u{20B9}${fareamount}",style: TextStyle(color: Colors.black,fontWeight: FontWeight.bold,
                fontSize: 20),),
            SizedBox(height: 20,),
            Text("This total amount of fare\n that hase been charged to rider",
              style: TextStyle(color: Colors.grey,fontWeight: FontWeight.bold,
                fontSize: 12),),
            SizedBox(height: 20,),
            Padding(padding:const EdgeInsets.only(top: 10)
            ,child: FlatButton(
                onPressed: (){
                  Navigator.pop(context);
                  Navigator.pop(context);
                },
                color: Colors.red,
                shape: RoundedRectangleBorder(
                  borderRadius: BorderRadius.circular(4)
                ),child: Row(
                mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                children: [
                  Text("Collect Cash",
                    style: TextStyle(color: Colors.white,fontWeight: FontWeight.bold,
                        fontSize: 17),),
                  Text("\u{20B9}",
                    style: TextStyle(color: Colors.white,fontWeight: FontWeight.bold,
                        fontSize: 17),),
                ],
              ),
              ),)
          ],

        ),
      ),
    );
  }
}
