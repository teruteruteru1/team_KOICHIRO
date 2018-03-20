
        $(function() {
            // 国名が変更されたら発動
            $('select[name="country_id_1"]').change(function() {
                // 選択されている国のクラス名を取得
                var countyName = $('select[name="country_id_1"] option:selected').attr("class");
                console.log(countyName);
        
                // 都市名の要素数を取得
                 var count = $('select[name="area_id_1"]').children().length;
        
                 // 都市名の要素数分、for文で回す
                for (var i=0; i<count; i++) {
                    var city = $('select[name="area_id_1"] option:eq(' + i + ')');
                    if(city.attr("class") === countyName) {
                        // 選択した国と同じクラス名だった場合
                        city.show();
                        }else {
                        // 選択した国とクラス名が違った場合
                        if(city.attr("class") === "msg") {
                            //都市名を選択して下さい」という要素だった場合
                            city.show();  //「都市名を選択して下さい」を表示させる
                            city.prop('selected',true);  //「都市名を選択して下さい」を強制的に選択されている状態にする
                        } else {
                        // 「都市名を選択して下さい」という要素でなかった場合
                            city.hide();
                        }
                    }
                }
            })
            $('select[name="country_id_2"]').change(function() {
                // 選択されている国のクラス名を取得
                var countyName = $('select[name="country_id_2"] option:selected').attr("class");
                console.log(countyName);
        
                // 都市名の要素数を取得
                 var count = $('select[name="area_id_2"]').children().length;
        
                 // 都市名の要素数分、for文で回す
                for (var i=0; i<count; i++) {
                    var city = $('select[name="area_id_2"] option:eq(' + i + ')');
                    if(city.attr("class") === countyName) {
                        // 選択した国と同じクラス名だった場合
                        city.show();
                        }else {
                        // 選択した国とクラス名が違った場合
                        if(city.attr("class") === "msg") {
                            //都市名を選択して下さい」という要素だった場合
                            city.show();  //「都市名を選択して下さい」を表示させる
                            city.prop('selected',true);  //「都市名を選択して下さい」を強制的に選択されている状態にする
                        } else {
                        // 「都市名を選択して下さい」という要素でなかった場合
                            city.hide();
                        }
                    }
                }
            })
            $('select[name="country_id_3"]').change(function() {
                // 選択されている国のクラス名を取得
                var countyName = $('select[name="country_id_3"] option:selected').attr("class");
                console.log(countyName);
        
                // 都市名の要素数を取得
                 var count = $('select[name="area_id_3"]').children().length;
        
                 // 都市名の要素数分、for文で回す
                for (var i=0; i<count; i++) {
                    var city = $('select[name="area_id_3"] option:eq(' + i + ')');
                    if(city.attr("class") === countyName) {
                        // 選択した国と同じクラス名だった場合
                        city.show();
                        }else {
                        // 選択した国とクラス名が違った場合
                        if(city.attr("class") === "msg") {
                            //都市名を選択して下さい」という要素だった場合
                            city.show();  //「都市名を選択して下さい」を表示させる
                            city.prop('selected',true);  //「都市名を選択して下さい」を強制的に選択されている状態にする
                        } else {
                        // 「都市名を選択して下さい」という要素でなかった場合
                            city.hide();
                        }
                    }
                }
            })
        })
 