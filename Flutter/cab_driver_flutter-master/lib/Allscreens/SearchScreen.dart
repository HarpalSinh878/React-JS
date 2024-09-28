import 'package:cabdriver/AllWidget/configMap.dart';
import 'package:cabdriver/AllWidget/progressDialog.dart';
import 'package:cabdriver/Asssitances/requestAssitance.dart';
import 'package:cabdriver/DataHandler/Address.dart';
import 'package:cabdriver/DataHandler/Appdata.dart';
import 'package:cabdriver/Models.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:http/http.dart';
import 'package:provider/provider.dart';

class SearchSrn extends StatefulWidget{
  @override
  SearchState createState() {
    // TODO: implement createState
    return SearchState();
  }

}
class SearchState extends State<SearchSrn> {
  List<Predictions>predictions=[];
  TextEditingController _pickuplocation=new TextEditingController();
  TextEditingController _dropofflocation=new TextEditingController();
  @override
  Widget build(BuildContext context) {
    String pickaddress=Provider.of<AppData>(context).pickloation.placesName??"";
    _pickuplocation.text=pickaddress;
    // TODO: implement build
    return Scaffold(
      body: SingleChildScrollView(
        child: Column(
          children: [
            SizedBox(height: 10,),
            Stack(
              alignment: Alignment.center,
              children: [
               Padding(padding: EdgeInsets.only(left: 10,right: 10,top: 50,bottom: 20),
               child:  Row(
                 mainAxisAlignment: MainAxisAlignment.start,
                 children: [
                   GestureDetector(
                     onTap: (){
                        Navigator.pop(context);
                     },
                     child: Icon(Icons.arrow_back),
                   ),SizedBox(width: 80),
                   Text("Set your drop off",style: TextStyle(color: Colors.grey[500],
                       fontSize: 18,fontWeight: FontWeight.bold),)
                 ],
               ),)
              ]
             ,
            ),
            Container(
              height: 180,
              width: double.maxFinite,
              padding: EdgeInsets.symmetric(horizontal: 10),
              decoration: BoxDecoration(
                color: Colors.white,
                boxShadow: [BoxShadow(color: Colors.white,offset: Offset(.7,.7,),
                spreadRadius: .6,blurRadius: .5)]
              ),
              child: Column(
                  children: [
                    Row(
                      children: [
                        SizedBox(width: 5,),
                        Image.asset("images/pickicon.png",width: 30,height: 30,),
                        SizedBox(width: 5,),
                        Expanded(
                          child: Padding(padding: EdgeInsets.only(left: 5,right: 10,top: 8,bottom: 8),
                              child: TextFormField(
                                controller: _pickuplocation,
                                decoration: InputDecoration(
                                    hintText: "Pickup location",
                                    enabledBorder: OutlineInputBorder(
                                        borderRadius:BorderRadius.circular(4),
                                        borderSide: BorderSide(color: Colors.grey[400]
                                            ,width: 1)
                                    ),
                                    fillColor: Colors.grey[400],
                                    filled: true,
                                    isDense: true
                                ),
                              ),
                            ),
                          ),
                      ],
                    )
                    , SizedBox(height: 5,),
                    Row(
                      children: [
                        SizedBox(width: 5,),
                        Image.asset("images/pickicon.png",width: 30,height: 30,),
                       SizedBox(width: 5,),
                       Expanded(
                            child: Padding(padding: EdgeInsets.only(left: 5,right: 10,top: 8,bottom: 8)
                            ,child:  TextFormField(
                                onChanged: (value){
                                  findPlaces(value);
                                },
                                  controller: _dropofflocation,
                                  decoration: InputDecoration(
                                      hintText: "Where to?",
                                      enabledBorder: OutlineInputBorder(
                                          borderRadius:BorderRadius.circular(4),
                                          borderSide: BorderSide(color: Colors.grey[400]
                                              ,width: 1)
                                      ),
                                      filled: true,
                                      fillColor: Colors.grey[400],
                                      isDense: true
                                  ),
                                ),
                            )
                          ),
                      ],
                    )
                  ],
                ),
            ),
            predictions.length==null?Container()
                :Padding(padding: EdgeInsets.only(top: 5,right: 2,bottom: 5)
            ,child: ListView.separated(itemBuilder:(context,indext){
              return PredictionTitle(predictions[indext]);
              },
                  separatorBuilder: (context, index)
                  => Divider(height: 1,color: Colors.grey[500],
                  thickness: 2,), itemCount: predictions.length,
                   shrinkWrap: true,
                scrollDirection: Axis.vertical,
               physics:ClampingScrollPhysics(),),)
          ],
        ),
      ),
    );
  }
  void findPlaces(String placeName) async{
    if (placeName.length > 1) {
      String requesturl =
          "https://maps.googleapis.com/maps/api/place/autocomplete/json?input=$placeName&key=$mapkey&components=country:in";
   var url=await RequestAssitance.getRequest(requesturl);
   if(url=="failed"){
     return;
   }if(url["status"]== "OK"){
       var pred=url["predictions"];
       setState(() {
         predictions=(pred as List).map((e) => Predictions.fromjson(e)).toList();
       });
      }
    }
  }

}

class PredictionTitle extends StatelessWidget{
  Predictions predictions;
  PredictionTitle(this.predictions, {Key key}):super(key: key);
  @override
  Widget build(BuildContext context) {
    // TODO: implement build
    return  FlatButton(
      onPressed: (){
    getPlaceDetails(predictions.pleces_id, context);
      },
      child: Container(
        alignment: Alignment.centerLeft,
           child: SingleChildScrollView(
             scrollDirection: Axis.horizontal,
             child: Row(
               mainAxisSize: MainAxisSize.max,
               mainAxisAlignment: MainAxisAlignment.start,
               children: [
                 Icon(Icons.location_on_sharp,size: 30,),
                 SizedBox(height: 5,width:10,),
                 Column(
                   crossAxisAlignment: CrossAxisAlignment.start,
                   children: [
                     Text("${predictions.main_text}",style: TextStyle(fontSize: 20),),
                     SizedBox(height: 8,),
                     Text("${predictions.secondary_text}",style: TextStyle(fontSize: 15,color: Colors.grey[400]),),
                     SizedBox(height: 8,),
                   ],
                 )
               ],
             ),
           ),
         ),
    );
  }
void getPlaceDetails(String placeid,context) async{
    showDialog(context: context,
      builder: (BuildContext context)=>ProgressDialog(message: "Setings dropOff please wait...",)
       );
    String placedetialurl="https://maps.googleapis.com/maps/api/place/details/json?place_id=${placeid}&key=${mapkey}";
    var url=     await RequestAssitance.getRequest(placedetialurl);
    Navigator.pop(context);
    if(url=="failed"){
      return;
    }
    if(url["status"]=="OK"){
      Address address=new Address();
      address.placesName=url["result"]["name"];
      address.placeid=placeid;
      address.latitude=url["result"]["geometry"]["location"]["lat"];
      address.longitude=url["result"]["geometry"]["location"]["lng"];
      Provider.of<AppData>(context,listen: false).updatedropOffLocation(address);
      print("place droff"+address.placesName);
      //Navigator.of(context,rootNavigator: true).pop();
      Navigator.pop(context,"obtained");
    }
}
}