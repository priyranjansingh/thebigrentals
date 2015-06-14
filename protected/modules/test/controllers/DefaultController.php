<?php

Yii::import("application.modules.admin.models.*", true);
Yii::import("application.modules.properties.models.*", true);

class DefaultController extends Controller {

    public function actionIndex() {
//        ini_set('max_execution_time', 3600);
        set_time_limit(0);
        $xml = simplexml_load_file("xml_file/xml_file/1.xml");
        $json = json_encode($xml);
        $array = json_decode($json, TRUE);
        $j = 0;
        foreach ($array['properties'] as $a) {
            foreach ($a as $i) {
                if ($j > 67) {
//                    pre($i['view'], true);
//                    die;
                    echo $j . "<br />";
                    if (!empty($i['view'])) {
                        $cat_check = Category::model()->findByAttributes(array('name' => $i['view']));
                        if (empty($cat_check)) {
                            $cat = new Category;
                            $cat->name = ucfirst($i['view']);
                            if ($cat->validate()) {
                                $cat->save();
                                echo "category <br/>";
                                $category = $cat->id;
                            } else {
                                echo "category error <br/>";
                                pre($cat->getErrors(), true);
                            }
                        } else {
                            echo "category exist <br/>";
                            $category = $cat_check->id;
                        }
                    } else {
                        $category = '6ef94489-c1e9-74a4-5c28-5531797f5596';
                    }

                    $model = new Property;
                    $model->title = $i['title'];
                    $model->description = $i['description'];
                    $model->country = $i['location']['address']['country'];
                    $model->state = $i['location']['address']['state'];
                    $model->city = $i['location']['address']['city'];
                    $model->zip = $i['location']['address']['zip'];
                    $model->latitude = $i['location']['gps_location']['latitude'];
                    $model->longitude = $i['location']['gps_location']['longitude'];
                    $n_bedroom = $i['accomodation']['bedrooms'];
                    if (is_numeric($n_bedroom)) {
                        $model->bedrooms = $n_bedroom;
                    } else {
                        $model->bedrooms = $n_bedroom = 2;
                    }
                    $n_bathroom = $i['accomodation']['bathrooms'];
                    if (is_numeric($n_bathroom)) {
                        $model->bathrooms = $i['accomodation']['bathrooms'];
                    } else {
                        $model->bathrooms = $n_bathroom = 1;
                    }

                    $model->year_built = 0;
                    $model->lot_size = 0;
                    $model->lot_size_unit = 0;
                    $model->rooms = $n_bedroom + $n_bathroom;
                    $model->category_id = $category;
                    $model->property_status = 1;
                    $model->listed_in = 'd0933b68-f3a3-e93c-c66b-54fc71b7f63f';
//                    pre($model->attributes,true);
                    if ($model->validate()) {
                        $model->save();
                        echo "property <br/>";
                        $property = $model->id;
                    } else {
                        echo "property error <br/>";
                        pre($model->getErrors(), true);
                    }
//                pre($i['amenities']);
                    foreach ($i['amenities']['item'] as $item) {
                        $check = AmenitiesFeatures::model()->findByAttributes(array('name' => $item));
                        if (empty($check)) {
                            $am_model = new AmenitiesFeatures;
                            $am_model->name = $item;
                            if ($am_model->validate()) {
                                echo "amenity <br/>";
                                $am_model->save();
                                $amenity = $am_model->id;
                            } else {
                                echo "amenity error <br/>";
                                pre($am_model->getErrors());
                            }
                        } else {
                            $amenity = $check->id;
                        }

                        $pa_model = new PropertyAmenities;
                        $pa_model->property_id = $property;
                        $pa_model->amenity_id = $amenity;
                        if ($pa_model->validate()) {
                            $pa_model->save();
                            echo "pa <br/>";
                        } else {
                            echo "pa error <br/>";
                            pre($pa_model->getErrors(), true);
                        }
                    }
                    if (!file_exists('images/property/' . $property)) {
                        mkdir('images/property/' . $property, 755, false);
                    }
                    $path = 'images/property/' . $property;

                    $k = 1;
                    foreach ($i['photos']['item'] as $photo) {

                        $url = $photo['photourl'];
                        $arr = explode(".", $url);
                        $ext = end($arr);
                        $filename = $property . '-' . $k . '.' . $ext;
                        $img = $path . '/' . $filename;


                        $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_NOBODY, true);
                        curl_exec($ch);
                        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

                        if ($code == 200) {
                            copy($url, $img);
                            if ($k == 1) {
                                $type = "m";
                            } else {
                                $type = "g";
                            }

                            $pg_model = new PropertyGallery;
                            $pg_model->property = $property;
                            $pg_model->image = $filename;
                            $pg_model->type = $type;
                            if ($pg_model->validate()) {
                                $pg_model->save();
                                echo "pg <br/>";
                            } else {
                                echo "pg error <br/>";
                                pre($pg_model->getErrors(), true);
                            }
                        }
                        curl_close($ch);

                        $k++;
                    }

                    foreach ($i['pricing']['rates']['item'] as $price) {
                        $pr_model = new PropertyPrice;
                        $pr_model->currency = '875b55ad-5048-7e81-ab97-54fd37112206';
                        $pr_model->month_price = $price['pricing']['monthly'];
                        $pr_model->night_price = $price['pricing']['dailyweekday'];
                        $pr_model->week_price = $price['pricing']['weekly'];
                        $pr_model->season = 'aut';
                        $pr_model->start_date = $price['start'];
                        $pr_model->end_date = $price['end'];
                        $pr_model->property_id = $property;
                        if ($pr_model->validate()) {
                            $pr_model->save();
                            echo "pr <br/>";
                        } else {
                            echo "pr error <br/>";
                            pre($pr_model->getErrors(), true);
                        }
                    }
                }
                $j++;
            }
        }
    }

    public function actionImg() {
        if (!file_exists('images/property/a7a1f8fb-d197-3ac9-d60d-55032f919f4b')) {
            $path = mkdir('images/property/a7a1f8fb-d197-3ac9-d60d-55032f919f4b', 755, false);
        } else {
            $path = 'images/property/a7a1f8fb-d197-3ac9-d60d-55032f919f4b';
        }

        $url = 'http://assets03.redawning.com/sites/default/files/rental_property/64/sunroom.jpg';
        $arr = explode(".", $url);
        $ext = end($arr);
        $filename = 'a7a1f8fb-d197-3ac9-d60d-55032f919f4b - 1.' . $ext;
        $img = $path . '/' . $filename;
        copy($url, $img);
    }

    public function actionCur() {
        $xml = simplexml_load_file("xml_file/xml_file/1.xml");
        $json = json_encode($xml);
        $array = json_decode($json, TRUE);
        foreach ($array['properties'] as $a) {
            foreach ($a as $i) {
//                foreach($i['pricing'])
            }
        }
    }

}
