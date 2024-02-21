<?php

namespace App\Mail;

use App\Models\Module\Module;
use App\Models\Users\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;

class MenteeAccepted extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public function __construct(
        public Module $module,
        public User $user,
    )
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pedido de Mentoria Aceito!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            htmlString: (new MailMessage)
                ->subject('Mentorias Fodas')
                ->line(sprintf('Salve %s, tudo tranquilo? Espero que sim!', $this->user->name))
                ->line('Se você está recebendo esse e-mail, significa que você foi aprovado/a em nossa mentoria!')
                ->line(sprintf('A trilha selecionada foi **%s**, e você deverá concluí-la na maior calma do mundo!', $this->module->name))
                ->line('Como isso é um processo de aprimoramento, eu gostaria MUITO que você fizesse as tarefas utilizando os meios comuns de estudo.')
                ->action('Começar Trilha', route('module.index'))
                ->render()
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
