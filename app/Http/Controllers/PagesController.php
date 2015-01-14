<?php namespace Dymantic\Http\Controllers;

use Dymantic\Commanding\CommandBus;
use Dymantic\ContactMessages\ContactMessageCommand;
use Dymantic\Http\Requests;
use Dymantic\Http\Controllers\Controller;
use Dymantic\Http\Requests\Contact\ContactFormRequest;

class PagesController extends Controller {

	/**
	 * @var CommandBus
	 */
	private $commandBus;

	public function __construct(CommandBus $commandBus)
	{

		$this->commandBus = $commandBus;
	}
	/**
	 * @GET("/")
	 * @return \Illuminate\View\View
     */
	public function showWelcome()
	{
		return view('pages.home');
	}

	/**
	 * @GET("services")
	 */
	public function showServicePage()
	{
		return view('pages.services');
	}

	/**
	 * @GET("getstarted")
	 * @return \Illuminate\View\View
     */
	public function showGetStartedPage()
	{
		return view('pages.getstarted');
	}

	/**
	 * @GET("quote")
	 * @return \Illuminate\View\View
     */
	public function showQuotePage()
	{
		return view('pages.quote');
	}

	/**
	 * @GET("contact")
	 * @return \Illuminate\View\View
	 */
	public function showContactPage()
	{
		return view('pages.contact');
	}

	/**
	 * @POST("contact")
	 * @param ContactFormRequest $request
	 * @return $this
     */
	public function postContactMessage(ContactFormRequest $request)
	{
		$name = $request->get('name');
		$email = $request->get('email');
		$message = $request->get('message');

		$command = new ContactMessageCommand($name, $email, $message);
		$this->commandBus->execute($command);

		return redirect('/thanks')->with('thanks_note', 'Thank You, '.$name.'! We will get back to you as soon as possible.');
	}

	/**
	 * @GET("thanks")
	 * @return \Illuminate\View\View
	 */
	public function showThankYouPage()
	{
		return view('pages.thanks');
	}

}
