<?php
    /**
     *
     */
    class Wallet
    {

        function __construct()
        {
            // code...
        }

        public function createWallet($uniqueId)
        {
            $url = "http://phili.test/wallet.class.php?action=insert_wallet&userid=" . $uniqueId;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
            $output = curl_exec($ch);
            curl_close($ch);

            return $output;
        }

        public function getWallet($user_id)
        {
            $url = "http://phili.test/wallet.class.php?action=get_wallet&userid=".$user_id;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
            $output = curl_exec($ch);
            curl_close($ch);

            return $output;
        }

        public function updateWallet($user_id,$money,$trans_id,$type)
        {
            if($type == "-"){
                $url = "http://phili.test/wallet.class.php?action=update_wallet&userid=".$user_id ."&amount=-".$money. "&trans_id=".$trans_id;
            } elseif($type == "+"){
                $url = "http://phili.test/wallet.class.php?action=update_wallet&userid=".$user_id ."&amount=".$money. "&trans_id=".$trans_id;
            }
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
            $output = curl_exec($ch);
            curl_close($ch);

            return $output;
        }

        public function checkTrans($trans_id){
            $url = "http://phili.test/wallet.class.php?action=check_trans_status&trans_id=".$trans_id;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
            $output = curl_exec($ch);
            curl_close($ch);

            return $output;
        }
    }

?>
