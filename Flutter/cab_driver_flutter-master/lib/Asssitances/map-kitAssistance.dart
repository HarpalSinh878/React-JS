import 'package:maps_toolkit/maps_toolkit.dart';

class MapkitAssitance{

  static double getRiderheadcalcultion(double slat,double slng,double dlat,double dlng){

    var rot=SphericalUtil.computeHeading(LatLng(slat,slng),LatLng(dlat, dlng));

    return rot;
  }
}