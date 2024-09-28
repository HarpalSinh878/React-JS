import 'package:get/get.dart';

class Languages extends Translations{
  @override
  // TODO: implement keys
  Map<String, Map<String, String>> get keys => {
    'en_US':{
      'title': 'Smart Light\nControl',
      'subtitle': 'The base of the lamp is created from anodized Aluminium',
      'on': 'Connected',
      'off': 'Disconnected',
      'username': 'User Name',
      'password': 'Password',
      'relaytitle': 'Relay Connections',
      'addnew': 'Add New Relay',
      'connectnew': 'Connect new relay with app',
      'add': 'ADD',
      'logt': 'Do you want to logout?',
      'cancel': 'Cancel',
      'logout': 'Logout',
      'trelay': 'Total Relay',
      'connectionerror': 'There is a connection error. Please check your internet and try again.',
    },
    'ar_SA':{
      'title': 'אור חכם\nבקרה',
      'subtitle': 'בסיס המנורה נוצר מאלומיניום אנודייז',
      'on': 'מְחוּבָּר',
      'off': 'מְנוּתָק',
      'username': 'שם משתמש',
      'password': 'סיסמה',
      'relaytitle': 'חיבורי ממסר',
      'addnew': 'הוסף ממסר חדש',
      'connectnew': 'חבר ממסר חדש לאפליקציה',
      'add': 'לְהוֹסִיף',
      'logs': 'להתנתק!',
      'logt': 'האם אתה רוצה להתנתק?',
      'cancel': 'לְבַטֵל',
      'logout': 'להתנתק',
      'trelay': 'סך הכל ממסרים',
      'connectionerror': 'יש שגיאת חיבור. בדוק את האינטרנט שלך ונסה שוב.',
    },
  };

}