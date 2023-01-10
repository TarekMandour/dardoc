<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Setting;
use App\Models\Page;
use App\Models\Category;
use App\Models\Post;
use App\Models\Contact;
use App\Models\Partner;
use App\Models\Offer;
use App\Models\Client;
use App\Models\ClientCard;
use App\Models\ClientDebt;
use App\Models\ClientPayment;
use App\Models\ClientNotification;

class DemoData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $add = new Admin;
        $add->name = 'Tarek Mandour';
        $add->email = 'tarek.mandourr@gmail.com';
        $add->phone = '01006287379';
        $add->password = Hash::make(123456);
        $add->is_active = 1;
        $add->role_id = 1;
        $add->save();

        $add = new Setting;
        $add->title = 'موقع تجريبي';
        $add->title_en = 'Demo Site';
        $add->meta_keywords = 'موقع تجريبي 1 , موقع تجريب 2';
        $add->meta_description = 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى';
        $add->meta_description_en = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.';
        $add->logo1 = 'logo1.png';
        $add->logo2 = 'logo2.png';
        $add->fav = 'fav.png';
        $add->breadcrumb = 'breadcrumb.png';
        $add->site_lang = 'ar';
        $add->phone1 = '01006287379';
        $add->phone2 = '01006287379';
        $add->email1 = 'tarek.mandourr@gmail.com';
        $add->email2 = 'tarek.mandourr@gmail.com';
        $add->address = 'العنوان شارع العنوان';
        $add->address_en = 'Address St 25 , towers';
        $add->website = 'https://demosite.com';
        $add->location = 'https://goo.gl/maps/HpUs2tj6om1f6rRM7';
        $add->whatsapp = '201006287379';
        $add->facebook = 'facebook';
        $add->twitter = 'twitter';
        $add->youtube = 'youtube';
        $add->linkedin = 'linkedin';
        $add->instagram = 'instagram';
        $add->snapchat = 'snapchat';
        $add->save();

        $add = new Page;
        $add->title = 'من نحن';
        $add->title_en = 'About us';
        $add->content = 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى';
        $add->content_en = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.';
        $add->meta_keywords = 'meta_keywords';
        $add->meta_description = 'meta_description';
        $add->save();

        $add = new Page;
        $add->title = 'سياسة الاستخدام';
        $add->title_en = 'Policy';
        $add->content = 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى';
        $add->content_en = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.';
        $add->meta_keywords = 'meta_keywords';
        $add->meta_description = 'meta_description';
        $add->save();

        $add = new Page;
        $add->title = 'الشروط والاحكام';
        $add->title_en = 'Terms';
        $add->content = 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى';
        $add->content_en = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.';
        $add->meta_keywords = 'meta_keywords';
        $add->meta_description = 'meta_description';
        $add->save();

        for ($i=1; $i < 13; $i++) { 
            $add = new Category;
            $add->name = 'قسم رئيسي '. $i;
            $add->name_en = 'Main Category '. $i;
            $add->parent = '0';
            $add->meta_keywords = 'meta_keywords';
            $add->meta_description = 'meta_description';
            $add->save();

            for ($c=1; $c < 4; $c++) { 
                $cat = new Category;
                $cat->name = 'قسم فرعي '. $c;
                $cat->name_en = 'Sub Category '. $c;
                $cat->parent = $add->id;
                $cat->meta_keywords = 'meta_keywords';
                $cat->meta_description = 'meta_description';
                $cat->save();
            }
        }

        for ($i=1; $i < 6; $i++) { 
            for ($k=1; $k < 13; $k++) {
            $add = new Post;
            $add->title = 'مقالة  '. $k;
            $add->title_en = 'Article  '. $k;
            $add->content = 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى';
            $add->content_en = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.';
            $add->cat_id = $i;
            $add->meta_keywords = 'meta_keywords';
            $add->meta_description = 'meta_description';
            $add->save();
            }
        }

        for ($i=1; $i < 4; $i++) { 
            $add = new Contact;
            $add->name = 'رسالة  '. $i;
            $add->email = 'tarek.mandourr'.$i.'@gmail.com';
            $add->phone = '01006287379';
            $add->msg = 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى';
            $add->save();
        }

        for ($i=1; $i < 7; $i++) { 
            $add = new Partner;
            $add->title = 'شركاؤنا  '. $i;
            $add->title_en = 'Partner  '. $i;
            $add->link = 'http://google.com';
            $add->save();
        }

        for ($i=1; $i < 7; $i++) { 
            $add = new Offer;
            $add->title = 'شركة 1  '. $i;
            $add->title_en = 'Company  '. $i;
            $add->slogan = 'النص هو مثال لنص يمكن أن يستبدل في نفس المساحة. '. $i;
            $add->slogan_en = 'Lorem Ipsum is simply dummy text of the printing  '. $i;
            $add->content = 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى';
            $add->content_en = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.';
            $add->save();
        }

        for ($i=1; $i < 7; $i++) { 
            $add = new Client;
            if ($i == 1) {
                $add->name = 'طارق ابو مندور';
            } else if ($i == 2) {
                $add->name = 'محمود الغرباوي';
            } else if ($i == 3) {
                $add->name = 'محمود درويش';
            } else if ($i == 4) {
                $add->name = 'نور خميس';
            } else if ($i == 5) {
                $add->name = 'اسامه زيدان';
            } else {
                $add->name = 'عميل تجريبي';
            }

            $add->membership_no = '848421-'.$i;
            $add->national_no = '8721801717198'.$i;
            $add->email = 'tarek.mandourr@gmail.com';
            $add->jop = 'Web Developer';
            $d=mktime(11, 14, 54, 8, $i, 1987);
            $add->birth_date = date("Y-m-d h:i:s", $d);
            $d=mktime(11, 14, 54, 8, $i, 2014);
            $add->register_date = date("Y-m-d h:i:s", $d);
            $add->phone = '20100628737'.$i;
            $add->password = Hash::make(123456);
            $add->photo = 'img1_1653665367.jpg';
            $add->is_active = 1;
            $add->type = 0;
            $add->parent_id = 0;
            $add->save();

            for ($x=1; $x < 4; $x++) { 
                $card = new ClientCard;
                $card->client_id = $add->id;
                $card->name = 'كارنيه '. $i;
                $card->save();
            }

            $debt = new ClientDebt;
            $debt->client_id = $add->id;
            $d=mktime(11, 14, 54, 30, 06, 2021);
            $debt->date = date("Y-m-d", $d);
            $debt->amount = 300;
            $debt->save();

            $debt = new ClientDebt;
            $debt->client_id = $add->id;
            $d=mktime(11, 14, 54, 30, 06, 2022);
            $debt->date = date("Y-m-d", $d);
            $debt->amount = 300;
            $debt->save();

            $pay = new ClientPayment;
            $pay->client_id = $add->id;
            $d=mktime(11, 14, 54, 30, 06, 2020);
            $pay->date = date("Y-m-d h:i:s", $d);
            $pay->amount = 300;
            $pay->save();

            for ($n=1; $n < 4; $n++) { 
                $notification = new ClientNotification;
                $notification->client_id = $add->id;
                $notification->title = 'تذكير سداد ';
                $notification->body = 'يرجى دفع مصاريف كارنيه ';
                $notification->save();
            }

            for ($y=1; $y < 3; $y++) { 
                $add = new Client;

                if ($i == 1) {
                    if ($y == 1) {
                        $add->name = 'مالك طارق ابو مندور';
                    } else if ($y == 2) {
                        $add->name = 'روفان طارق ابو مندور';
                    }
                } else if ($i == 2) {
                    if ($y == 1) {
                        $add->name = 'ادم محمود الغرباوي';
                    } else if ($y == 2) {
                        $add->name = 'ايسل محمود الغرباوي';
                    }
                } else if ($i == 3) {
                    if ($y == 1) {
                        $add->name = 'مؤمن محمود درويش';
                    } else if ($y == 2) {
                        $add->name = 'ساره محمود درويش';
                    }
                } else if ($i == 4) {
                    if ($y == 1) {
                        $add->name = 'ليليا نور خميس';
                    } else if ($y == 2) {
                        $add->name = 'سليم نور خميس';
                    }
                } else if ($i == 5) {
                    if ($y == 1) {
                        $add->name = 'لي لي اسامه زيدان';
                    } else if ($y == 2) {
                        $add->name = 'عز اسامه زيدان';
                    }
                } else {
                    $add->name = 'عميل تابع تجريبي';
                }
               
                $add->membership_no = '84842.'.$i.'-'.$y;
                $add->national_no = '8721801717198.'.$i.'-'.$y;
                $add->email = 'tarek.mandourr@gmail.com';
                $add->jop = 'Web Developer';
                $d=mktime(11, 14, 54, 8, $i, 1987);
                $add->birth_date = date("Y-m-d h:i:s", $d);
                $d=mktime(11, 14, 54, 8, $i, 2014);
                $add->register_date = date("Y-m-d h:i:s", $d);
                $add->phone = '2010062873'.$i.$y;
                $add->photo = 'img1_1653665367.jpg';
                $add->password = Hash::make(123456);
                $add->is_active = 1;
                $add->type = 1;
                $add->parent_id = $add->id;
                $add->save();
            }

            
        }

    }
}
