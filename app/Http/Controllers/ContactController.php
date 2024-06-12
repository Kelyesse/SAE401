<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    public function sendMail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'obj' => 'required|string',
            'mess' => 'required|string',
        ]);

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'mail.kourdourli.pro';
            $mail->SMTPAuth = true;
            $mail->Username = 'polymedia@kourdourli.pro';
            $mail->Password = 'jX4!V8W_vPhXAW7';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->setFrom('polymedia@kourdourli.pro', 'Polymedia');
            $mail->addAddress('polymedia@kourdourli.pro');
            $mail->addReplyTo($request->email, $request->nom);

            $mail->isHTML(true);
            $mail->Subject = 'Nouveau message de contact depuis votre site';
            $mail->Body = "Nom: {$request->nom}<br/>Prénom: {$request->prenom}<br/>Email: {$request->email}<br/>Objet: {$request->obj}<br/>Message:<br/>{$request->mess}";
            $mail->AltBody = strip_tags("Nom: {$request->nom}\nPrénom: {$request->prenom}\nEmail: {$request->email}\nObjet: {$request->obj}\nMessage:\n{$request->mess}");

            $mail->send();

            return back()->with('success', 'Mail envoyé avec succès!');
        } catch (Exception $e) {
            return back()->withErrors('Message could not be sent. Mailer Error: '.$mail->ErrorInfo);
        }
    }
}