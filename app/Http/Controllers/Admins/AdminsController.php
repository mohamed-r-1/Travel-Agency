<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\City\City;
use App\Models\Country\Country;
use App\Models\Reservation\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{

        public function viewLogin() {

            return view('admins.login');

        }

        public function checkLogin(Request $request) {

            $remember_me = $request->has('remember_me') ? true : false;

            if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {

                return redirect() -> route('admins.dashboard');
            }
            return redirect()->back()->with(['error' => 'error logging in']);

        }

        public function index() {

            $countriesCount = Country::select()->count();
            $citiesCount = City::select()->count();
            $adminsCount = Admin::select()->count();

            return view('admins.index', compact('countriesCount','citiesCount','adminsCount'));

        }

        public function allAdmins() {

            $allAdmins = Admin::select()->orderBy('id', 'desc')->get();

            return view('admins.alladmins', compact('allAdmins'));

        }

        public function createAdmins() {

            return view('admins.createadmins');

        }

        public function storeAdmins(Request $request) {

            $storeAdmins = Admin::create([

                "name" => $request->name,
                "email" => $request->email,
                "password" => Hash::make($request->password),

            ]);

            if ($storeAdmins) {

                return redirect()->route('admins.all.admins')->with(['success' => 'Admin Created Successfully']);

            }

        }

        public function allCountries() {

            $allCountries = Country::select()->orderBy('id','desc')->get();

            return view('admins.allcountries', compact('allCountries'));

        }

        public function createCountries() {

            return view('admins.createcountries');

        }

        public function storeCountries(Request $request) {

            Request()->validate([

                "name" => "required|max:40",
                "population" => "required|max:40",
                "territory" => "required|max:40",
                "avg_price" => "required|max:40",
                "description" => "required|max:40",
                "image" => "required|max:40",
                "continent" => "required|max:40",

            ]);

            $destinationPath = 'assets/images/';
            $myimage = $request->image->getClientOriginalName();
            $request->image->move(public_path($destinationPath), $myimage);

            $storeCountries = Country::create([

                "name" => $request->name,
                "population" => $request->population,
                "territory" => $request->territory,
                "avg_price" => $request->avg_price,
                "description" => $request->description,
                "image" => $myimage,
                "continent" => $request->continent,

            ]);

            if ($storeCountries) {

                return redirect()->route('all.countries')->with(['success' => 'Country Created Successfully']);

            }

        }

        public function deleteCountries($id) {

            $deleteCountry = Country::find($id);

            if(File::exists(public_path('assets/images/' . $deleteCountry->image))){
                File::delete(public_path('assets/images/' . $deleteCountry->image));
            }else{
                //dd('File does not exists.');
            }

            $deleteCountry->delete();

            if ($deleteCountry) {

                return redirect()->route('all.countries')->with(['delete' => 'Country Deleted Successfully']);

            }

        }

        public function allCities() {

            $cities = City::select()->orderBy('id', 'desc')->get();

            return view('admins.allcities', compact('cities'));

        }

        public function createCities() {

            $countries = Country::all();

            return view('admins.createcities', compact('countries'));

        }

        public function storeCities(Request $request) {

            Request()->validate([

                "name" => "required|max:40",
                "price" => "required|max:40",
                "image" => "required|max:700",
                "num_days" => "required|max:40",
                "country_id" => "required|max:40",

            ]);

            $destinationPath = 'assets/images/';
            $myimage = $request->image->getClientOriginalName();
            $request->image->move(public_path($destinationPath), $myimage);

            $storeCities = City::create([

                "name" => $request->name,
                "price" => $request->price,
                "image" => $myimage,
                "num_days" => $request->num_days,
                "country_id" => $request->country_id,

            ]);

            if ($storeCities) {

                return redirect()->route('all.cities')->with(['success' => 'City Created Successfully']);

            }

        }

        public function deleteCities($id) {

            $deleteCity = City::find($id);

            if(File::exists(public_path('assets/images/' . $deleteCity->image))){
                File::delete(public_path('assets/images/' . $deleteCity->image));
            }else{
                //dd('File does not exists.');
            }

            $deleteCity->delete();

            if ($deleteCity) {

                return redirect()->route('all.cities')->with(['delete' => 'City Deleted Successfully']);

            }

        }

        public function allBookings() {

            $bookings = Reservation::select()->orderBy('id','desc')->get();

            return view('admins.allbookings', compact('bookings'));

        }

        public function editBookings($id) {

            $booking = Reservation::find($id);

            return view('admins.editbooking', compact('booking'));

        }

        public function updateBookings(Request $request, $id) {

            $editBooking = Reservation::find($id);

            $editBooking->update($request->all());

            if ($editBooking) {

                return redirect()->route('all.bookings')->with(['update' => 'Booking Status Updated Successfully']);

            }

        }

        public function deleteBookings($id) {

            $deleteBooking = Reservation::find($id);

            $deleteBooking->delete();

            if ($deleteBooking) {

                return redirect()->route('all.bookings')->with(['delete' => 'Booking Deleted Successfully']);

            }

        }

}
