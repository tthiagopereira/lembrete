<?php

namespace App\Http\Controllers;

use App\Lembrete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EnviarLembreteController extends Controller
{
    private $email = '';

    public function enviarEmail()
    {
        date_default_timezone_set('America/Manaus');

        $registers = Lembrete::where('status','=',1)->get();

        foreach ($registers as $item) {
            sleep(4);

            $this->email = $item->email;

            $timeAtual = date('H:i');
            $dataAtual = date("Y-m-d");

            if ($item->repeticao == 'Diariamente') {
                if($timeAtual == date("H:i", strtotime($item->hora)) ) {

                    Mail::send('mail.envio', ['title' => $item->nome, 'data' => $item->data, 'hora' => $item->hora, 'repeticao' => $item->repeticao], function($m) {
                        $m->from('tthiagopereira7@gmail.com', 'THIAGO PEREIRA DOS SANTOS');
                        $m->to($this->email);
                    });

                    if($item->repeticao == 'Não se repete') {
                        $this->updateRepeticao($item->id);
                    }

                }
            }

            if($dataAtual == $item->data) {
                $email = $item->mail;

                if($timeAtual == date("H:i", strtotime($item->hora)) ) {

                    Mail::send('mail.envio', ['title' => $item->nome, 'data' => $item->data, 'hora' => $item->hora, 'repeticao' => $item->repeticao], function($m) {
                        $m->from('tthiagopereira7@gmail.com', 'THIAGO PEREIRA DOS SANTOS');
                        $m->to($this->email);
                    });

                    if($item->repeticao == 'Não se repete') {
                        $this->updateRepeticao($item->id);
                    }

                }

            }
        }

        return response()->json(['message' => 'Email enviado com sucesso']);
    }


    public function enviarEmailHora()
    {
        date_default_timezone_set('America/Manaus');

        $registers = Lembrete::where('status','=',1)
        ->where('repeticao', '=', 'cada uma hora')            
        ->get();

        foreach ($registers as $item) {
            sleep(4);

            $this->email = $item->email;

            $timeAtual = date('H:i');
            $dataAtual = date("Y-m-d");

                $email = $item->mail;
                    Mail::send('mail.envio', ['title' => $item->nome, 'data' => $item->data, 'hora' => $item->hora, 'repeticao' => $item->repeticao], function($m) {
                        $m->from('tthiagopereira7@gmail.com', 'THIAGO PEREIRA DOS SANTOS');
                        $m->to($this->email);
                    });    
        }

        return response()->json(['message' => 'Email enviado com sucesso']);
    }

    public function updateRepeticao($id)
    {
        $register = Lembrete::find($id);
        $register->status = false;
        $register->update();
        return 0;
    }

}
