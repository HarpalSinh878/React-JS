class RelaysModel {
  RelaysModel({
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
  int lastReceivedTime;
  String relatedEquipment;
  bool noSql;

  factory RelaysModel.fromJson(Map<String, dynamic> json) => RelaysModel(
        jsonType: json["json-type"] ?? "",
        jsonId: json["json-id"] ?? "",
        id: json["id"] ?? "",
        name: json["name"] ?? "",
        description: json["description"] ?? "",
        softDelete: json["softDelete"] ?? false,
        dtype: json["dtype"] ?? "",
        systemObject: json["systemObject"] ?? false,
        serial: json["serial"] ?? "",
        externalId: json["externalId"] ?? "",
        nameHe: json["nameHe"] ?? "",
        buildingFloor: json["buildingFloor"] ?? "",
        room: json["room"] ?? "",
        geoHash1: json["geoHash1"] ?? "",
        enable: json["enable"] ?? false,
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
        lastReceivedTime: json["lastReceivedTime"] ?? 0,
        relatedEquipment: json["relatedEquipment"] ?? "",
        noSql: json["noSQL"] ?? false,
      );

  Map<String, dynamic> toJson() => {
        "json-type": jsonType,
        "json-id": jsonId,
        "id": id,
        "name": name,
      };

  static List<RelaysModel> getListFromJson(List<dynamic> list) {
    List<RelaysModel> unitList = [];
    list.forEach((unit) {
      if (unit is String) {
      } else
        unitList.add(RelaysModel.fromJson(unit));
    });
    return unitList;
  }
}
