import 'package:flutter/foundation.dart';
import 'package:google_maps_flutter/google_maps_flutter.dart';

class RiderDetails{
  LatLng pick_latlng;
  LatLng dropoff_latlng;
  String pick_address;
  String drop_address;
  String ride_request_id;
  String payment_method;
  String rider_name;
  String rider_phone;
 RiderDetails({this.pick_latlng,this.dropoff_latlng,this.pick_address,this.drop_address,this.ride_request_id,this.payment_method,
 this.rider_name,this.rider_phone});
}