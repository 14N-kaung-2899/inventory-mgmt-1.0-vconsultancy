<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\District;
use App\Models\Subdistrict;
use App\Models\City;
use Illuminate\Http\Request;

class CountryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('country.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    //Manual Seeding Of Country Thailand
    $country = new Country();
    $country->id = '1';
    $country->name = 'Thailand';
    $country->save();

    //Manual Seeding Of City Bangkok
    $city = new City();
    $city->id = '1';
    $city->name = 'Bangkok';
    $city->country_id = '1';
    $city->save();

    //Manual Seeding Of Districts In Bangkok        
    $disarr = array(
      "Bang Bon",
      "Bang Kapi",
      "Bang Khae",
      "Bang Khen",
      "Bang Kho Laem",
      "Bang Khun Thian",
      "Bang Na",
      "Bang Phlat",
      "Bang Rak",
      "Bang Sue",
      "Bangkok Noi",
      "Bangkok Yai",
      "Bueng Kum",
      "Chatuchak",
      "Chom Thong",
      "Din Daeng",
      "Don Mueang",
      "Dusit",
      "Huai Khwang",
      "Khan Na Yao",
      "Khlong Sam Wa",
      "Khlong San",
      "Khlong Toei",
      "Lak Si",
      "Lat Krabang",
      "Lat Phrao",
      "Min Buri",
      "Nong Chok",
      "Nong Khaem",
      "Pathum Wan",
      "Phasi Charoen",
      "Phaya Thai",
      "Phra Khanong",
      "Phra Nakhon",
      "Pom Prap Sattru Phai",
      "Prawet",
      "Rat Burana",
      "Ratchathewi",
      "Sai Mai",
      "Samphanthawong",
      "Saphan Sung",
      "Sathon",
      "Suan Luang",
      "Taling Chan",
      "Thawi Watthana",
      "Thon Buri",
      "Thung Khru",
      "Wang Thonglang",
      "Watthana",
      "Yan Nawa"
    );

    $postal = array(
      "10150",
      "10240",
      "10160",
      "10220",
      "10120",
      "10150",
      "10260",
      "10700",
      "10500",
      "10800",
      "10700",
      "10600",
      "10240",
      "10900",
      "10150",
      "10400",
      "10210",
      "10300",
      "10310",
      "10230",
      "10510",
      "10600",
      "10110",
      "10210",
      "10520",
      "10230",
      "10510",
      "10530",
      "10160",
      "10330",
      "10160",
      "10400",
      "10260",
      "10200",
      "10100",
      "10250",
      "10140",
      "10400",
      "10220",
      "10100",
      "10240",
      "10120",
      "10250",
      "10170",
      "10170",
      "10600",
      "10140",
      "10310",
      "10110",
      "10120"
    );

    for ($dloop = 0; $dloop < count($disarr); $dloop++) {
      $district = new District();
      $district->id = ($dloop + 1);
      $district->name = $disarr[$dloop];
      $district->postcode = $postal[$dloop];
      $district->city_id = '1';
      $district->save();
    }

    //Manual Seeding Of Sub-Districts In Bangkok    
    $sdistrict = new Subdistrict();
    $subdisarr = array(
        "Bang Bon Nuea",
        "Bang Bon Tai",
        "Khlong Bang Phran",
        "Khlong Bang Bon",
        "Khlong Chan",
        "Hua Mak",
        "Bang Khae",
        "Bang Khae Nuea",
        "Bang Phai",
        "Lak Song",
        "Anusawari",
        "Tha Raeng",
        "Bang Kho Laem",
        "Wat Phraya Krai",
        "Bang Khlo",
        "Tha Kham",
        "Samae Dam",
        "Bang Na Nuea",
        "Bang Na Tai",
        "Bang Phlat",
        "Bang O",
        "Bang Bamru",
        "Bang Yi Khan",
        "Maha Phruettharam",
        "Si Lom",
        "Suriyawong",
        "Bang Rak",
        "Si Phraya",
        "Bang Sue",
        "Wong Sawang ",
        "Siri Rat",
        "Ban Chang Lo",
        "Bang Khun Non",
        "Bang Khun Si",
        "Arun Amarin",
        "Wat Arun",
        "Wat Tha Phra ",
        "Khlong Kum ",
        "Nawamin ",
        "Nuan Chan ",
        "Lat Yao",
        "Sena Nikhom",
        "Chan Kasem",
        "Chomphon",
        "Chatuchak",
        "Bang Khun Thian ",
        "Bang Kho",
        "Bang Mot",
        "Chom Thong",
        "Din Daeng ",
        "Ratchadaphisek ",
        "Si Kan ",
        "Don Mueang ",
        "Sanam Bin ",
        "Dusit",
        "Wachiraphayaban",
        "Suan Chitlada",
        "Si Yaek Maha Nak",
        "Thanon Nakhon Chai Si ",
        "Huai Khwang",
        "Bang Kapi",
        "Sam Sen Nok",
        "Khan Na Yao ",
        "Ram Inthra ",
        "Sam Wa Tawan Tok ",
        "Sam Wa Tawan Ok",
        "Bang Chan",
        "Sai Kong Din",
        "Sai Kong Din Tai",
        "Somdet Chao Phraya ",
        "Khlong San",
        "Bang Lamphu Lang",
        "Khlong Ton Sai",
        "Khlong Toei",
        "Khlong Tan",
        "Phra Khanong",
        "Thung Song Hong ",
        "Talat Bang Khen ",
        "Lat Krabang",
        "Khlong Song Ton Nun",
        "Khlong Sam Prawet",
        "Lam Pla Thio",
        "Thap Yao",
        "Khum Thong",
        "Lat Phrao",
        "Chorakhe Bua",
        "Min Buri ",
        "Saen Saep ",
        "Krathum Rai",
        "Nong Chok",
        "Khlong Sip",
        "Khlong Sip Song",
        "Khok Faet",
        "Khu Fang Nuea",
        "Lam Phak Chi",
        "Lam Toiting",
        "Nong Khaem",
        "Nong Khang Phlu ",
        "Rong Mueang",
        "Wang Mai",
        "Pathum Wan",
        "Lumphini",
        "Bang Wa",
        "Bang Duan",
        "Bang Chak",
        "Bang Waek",
        "Khlong Khwang",
        "Pak Khlong Phasi Charoen ",
        "Khuha Sawan",
        "Sam Sen Nai",
        "Phaya Thai",
        "Bang Chak ",
        "Phra Khanong Tai ",
        "Phra Borom Maha Ratchawang ",
        "Wang Burapha Phirom",
        "Wat Ratchabophit",
        "Samran Rat",
        "San Chaopho Suea",
        "Sao Chingcha",
        "Bowon Niwet",
        "Talat Yot",
        "Chana Songkhram",
        "Ban Phan Thom",
        "Bang Khun Phrom ",
        "Wat Sam Phraya",
        "Pom Prap",
        "Wat Thep Sirin",
        "Khlong Maha Nak",
        "Ban Bat",
        "Wat Sommanat",
        "Prawet",
        "Nong Bon",
        "Dokmai",
        "Rat Burana ",
        "Bang Pakok ",
        "Thung Phaya Thai",
        "Thanon Phaya Thai",
        "Thanon Phetchaburi ",
        "Makkasan",
        "Sai Mai",
        "O Ngoen",
        "Khlong Thanon ",
        "Chakkrawat",
        "Samphanthawong ",
        "Talat Noi",
        "Saphan Sung ",
        "Rat Phatthana ",
        "Thap Chang ",
        "Thung Wat Don",
        "Yan Nawa",
        "Thung Maha Mek ",
        "Suan Luang ",
        "On Nut ",
        "Phatthanakan ",
        "Khlong Chak Phra ",
        "Taling Chan",
        "Chimphli",
        "Bang Phrom",
        "Bang Ramat",
        "Bang Chueak Nang",
        "Thawi Watthana",
        "Sala Thammasop ",
        "Wat Kanlaya",
        "Hiran Ruchi",
        "Bang Yi Ruea ",
        "Bukkhalo",
        "Talat Phlu",
        "Dao Khanong",
        "Samre",
        "Bang Mot",
        "Thung Khru ",
        "Wang Thonglang ",
        "Saphan Song ",
        "Khlong Chaokhun Sing",
        "Phlapphla",
        "Khlong Toei Nuea",
        "Khlong Tan Nuea",
        "Phra Khanong Nuea",
        "Chong Nonsi",
        "Bang Phongphang",
    );

    $subdisfk = array(
     "1",
     "1",
     "1",
     "1",
     "2",
     "2",
     "3",
     "3",
     "3",
     "3",
     "4",
     "4",
     "5",
     "5",
     "5",
     "6",
     "6",
     "7",
     "7",
     "8",
     "8",
     "8",
     "8",
     "9",
     "9",
     "9",
     "9",
     "9",
      "10",
      "10",
      "11",
      "11",
      "11",
      "11",
      "11",
      "12",
      "12",
      "13",
      "13",
      "13",
      "14",
      "14",
      "14",
      "14",
      "14",
      "15",
      "15",
      "15",
      "15",
      "16",
      "16",
      "17",
      "17",
      "17",
      "18",
      "18",
      "18",
      "18",
      "18",
      "19",
      "19",
      "19",
      "20",
      "20",
      "21",
      "21",
      "21",
      "21",
      "21",
      "22",
      "22",
      "22",
      "22",
      "23",
      "23",
      "23",
      "24",
      "24",
      "25",
      "25",
      "25",
      "25",
      "25",
      "25",
      "26",
      "26",
      "27",
      "27",
      "28",
      "28",
      "28",
      "28",
      "28",
      "28",
      "28",
      "28",
      "29",
      "29",
      "30",
      "30",
      "30",
      "30",
      "31",
      "31",
      "31",
      "31",
      "31",
      "31",
      "31",
      "32",
      "32",
      "33",
      "33",
      "34",
      "34",
      "34",
      "34",
      "34",
      "34",
      "34",
      "34",
      "34",
      "34",
      "34",
      "34",
      "35",
      "35",
      "35",
      "35",
      "35",
      "36",
      "36",
      "36",
      "37",
      "37",
      "38",
      "38",
      "38",
      "38",
      "39",
      "39",
      "39",
      "40",
      "40",
      "40",
      "41",
      "41",
      "41",
      "42",
      "42",
      "42",
      "43",
      "43",
      "43",
      "44",
      "44",
      "44",
      "44",
      "44",
      "44",
      "45",
      "45",
      "46",
      "46",
      "46",
      "46",
      "46",
      "46",
      "46",
      "47",
      "47",
      "48",
      "48",
      "48",
      "48",
      "49",
      "49",
      "49",
      "50",
      "50"
    );

    for ($dloop = 0; $dloop < count($subdisarr); $dloop++) {
      $sdis = new Subdistrict();
      $sdis->id = ($dloop + 1);
      $sdis->name = $subdisarr[$dloop];
      $sdis->district_id = $subdisfk[$dloop];
      $sdis->save();
    }
    
    return view('country.create');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Country  $country
   * @return \Illuminate\Http\Response
   */
  public function show(Country $country)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Country  $country
   * @return \Illuminate\Http\Response
   */
  public function edit(Country $country)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Country  $country
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Country $country)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Country  $country
   * @return \Illuminate\Http\Response
   */
  public function destroy(Country $country)
  {
    //
  }
}
