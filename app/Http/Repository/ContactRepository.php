<?php
/**
 * Created by PhpStorm.
 * User: Adewale Hammed
 * Date: 10/4/2016
 * Time: 12:10 PM
 */

namespace App\Http\Repository;
use App\Contact;
use Illuminate\Http\Request;

class ContactRepository implements ContactFacade
{
    /**
     * Gets all faculty from the database
     * @return mixed
     */
    public function index()
    {
        return Course::all();
    }
    /**
     * Gets a single faculty from the database
     * @return mixed
     */
    public function show($slug)
    {
        return Course::whereSlug($slug)->get()->first();
    }

    /**
     * Save a single faculty from the database
     * @return boolean
     */
    public function store(Request $request)
    {
        $contact                     =   new Contact();
        $contact->name               =   $request->name;
        $contact->email              =   $request->email;
        $contact->subject      =   $request->subject;
        $contact->body        =   $request->body;
        $contact->purpose           =   $request->purpose;
        $contact->slug               =   uniqid();
        $isSaved                    =   $contact->save();
        return $isSaved;
    }
    /**
     *
     */
    public function destroy($slug)
    {
        $status                   =   "";
        $isFind                     =   false;
        $isFind = Contact::whereSlug($slug)->get()->first();
        if ($isFind != null) {
            $isDeleted = $isFind->delete();
            if ($isDeleted) {
                $status            =   "Contact found and deleted successfully";
            }
            else {
                $status            =   "Contact is not deleted but found";
            }
        }
        else{
            $status                =    "Contact not found";
        }
        return $status;
    }
}