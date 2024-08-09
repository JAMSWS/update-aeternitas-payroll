<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class employeeMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $employee;
    /**
     * Create a new message instance.
     */
    public function __construct($employee)
    {
        //
        $this->employee = $employee;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Employee Payslip',
        );
    }

    public function build()
    {
        return $this->subject('Your Payslip')
        ->view('hrdepartment.employee.generate-employee')
        ->with([
            'employee' => $this->employee,
        ]);
    }
    /**
     * Get the message content definition.
     */

}
