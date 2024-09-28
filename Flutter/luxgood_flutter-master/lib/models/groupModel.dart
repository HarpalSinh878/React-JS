import 'package:luxgood/models/replayModel.dart';

import 'groupStateModel.dart';

class GroupModel {
  GroupModel({
    required this.jsonType,
    required this.jsonId,
    required this.id,
    required this.name,
    required this.description,
    required this.softDelete,
    required this.dtype,
    required this.systemObject,
    required this.serial,
    required this.externalId,
    required this.nameHe,
    required this.buildingFloor,
    required this.room,
    required this.geoHash1,
    required this.enable,
    required this.floorForEquipment,
    required this.humanReadableLocation,
    required this.warrantyExpiration,
    required this.address,
    required this.communicationGateway,
    required this.apiProvider,
    required this.icon,
    required this.descriptor3D,
    required this.relayNumber,
    required this.state,
    required this.group,
    required this.relays,
    required this.lastReceivedTime,
    required this.relatedEquipment,
    required this.noSql,
  });

  String jsonType;
  String jsonId;
  String id;
  String name;
  String description;
  bool softDelete;
  String dtype;
  bool systemObject;
  String serial;
  String externalId;
  String nameHe;
  String buildingFloor;
  String room;
  String geoHash1;
  bool enable;
  String floorForEquipment;
  String humanReadableLocation;
  String warrantyExpiration;
  String address;
  String communicationGateway;
  String apiProvider;
  String icon;
  String descriptor3D;
  int relayNumber;
  bool state;
  Group group;
  List<RelaysModel> relays;
  int lastReceivedTime;
  String relatedEquipment;
  bool noSql;
  GroupStateModel? groupState;

  factory GroupModel.fromJson(Map<String, dynamic> json) => GroupModel(
    jsonType: json["json-type"]??"",
    jsonId: json["json-id"]??"",
    id: json["id"]??"",
    name: json["name"]??"",
    description: json["description"] ?? "",
    softDelete: json["softDelete"]??false,
    dtype: json["dtype"]??"",
    systemObject: json["systemObject"]??false,
    serial: json["serial"] ?? "",
    externalId: json["externalId"] ?? "",
    nameHe: json["nameHe"] ?? "",
    buildingFloor: json["buildingFloor"] ?? "",
    room: json["room"] ?? "",
    geoHash1: json["geoHash1"]??"",
    enable: json["enable"]??false,
    floorForEquipment: json["floorForEquipment"] ?? "",
    humanReadableLocation: json["humanReadableLocation"] ?? "",
    warrantyExpiration: json["warrantyExpiration"] ?? "",
    address: json["address"] ?? "",
    communicationGateway: json["communicationGateway"] ?? "",
    apiProvider: json["apiProvider"] ?? "",
    icon: json["icon"] ?? "",
    descriptor3D: json["descriptor3D"] ?? "",
    relayNumber: json["relayNumber"] ?? 0,
    state: json["state"] ?? false,
    group: Group.fromJson(json["group"]),
    relays: RelaysModel.getListFromJson(json["relays"]),
    lastReceivedTime: json["lastReceivedTime"] ?? 0,
    relatedEquipment: json["relatedEquipment"]??"",
    noSql: json["noSQL"]??false,
  );

  Map<String, dynamic> toJson() => {
    "json-type": jsonType,
    "json-id": jsonId,
    "id": id,
    "name": name,
  };

  static List<GroupModel> getListFromJson(List<dynamic> list) {
    List<GroupModel> unitList = [];
    list.forEach((unit) => unitList.add(GroupModel.fromJson(unit)));
    return unitList;
  }
}

class Group {
  Group({
    required this.jsonType,
    required this.jsonId,
    required this.id,
    required this.name,
    required this.description,
    required this.softDelete,
    required this.dtype,
    required this.tenant,
    required this.systemObject,
    required this.externalId,
    required this.parent,
    required this.noSql,
  });

  String jsonType;
  String jsonId;
  String id;
  String name;
  String description;
  bool softDelete;
  String dtype;
  String tenant;
  bool systemObject;
  String externalId;
  String parent;
  bool noSql;

  factory Group.fromJson(Map<String, dynamic> json) => Group(
    jsonType: json["json-type"]??"",
    jsonId: json["json-id"]??"",
    id: json["id"]??"",
    name: json["name"]??"",
    description: json["description"]??"",
    softDelete: json["softDelete"]??false,
    dtype: json["dtype"]??"",
    tenant: json["tenant"]??"",
    systemObject: json["systemObject"]??"",
    externalId: json["externalId"]??"",
   parent: json["parent"]??"",
    noSql: json["noSQL"]??false,
  );

  Map<String, dynamic> toJson() => {
    "json-type": jsonType,
    "json-id": jsonId,
    "id": id,
    "name": name,
    "description": description,
    "softDelete": softDelete,
    "dtype": dtype,
    "tenant": tenant,
    "systemObject": systemObject,
    "externalId": externalId,
    "parent": parent,
    "noSQL": noSql,
  };
}

