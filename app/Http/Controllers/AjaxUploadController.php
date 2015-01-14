<?php namespace Dymantic\Http\Controllers;

use Dymantic\AjaxFileUploads\LogoImageUploads\LogoImageUploadCommand;
use Dymantic\AjaxFileUploads\PrintDocUploads\PrintDocUploadCommand;
use Dymantic\AjaxFileUploads\PrintImageUploads\PrintImageUploadCommand;
use Dymantic\Commanding\CommandBus;
use Dymantic\AjaxFileUploads\QuoteFileUploads\QuoteFileUploadCommand;
use Dymantic\Http\Requests\Ajax;
use Dymantic\Http\Controllers\Controller;
use Dymantic\Http\Requests\Ajax\Quotes\DocUploadFormRequest;
use Dymantic\Http\Requests\Ajax\Quotes\QuoteFileUploadFormRequest;
use Dymantic\Http\Requests\Ajax\Quotes\ImageUploadFormRequest;
use Illuminate\Http\Request;

class AjaxUploadController extends Controller {

	/**
	 * @var CommandBus
	 */
	private $commandBus;

	public function __construct(CommandBus $commandBus)
	{

		$this->commandBus = $commandBus;
	}

	/**
	 * @POST("qquploads")
	 * @param QuoteFileUploadFormRequest|Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function storeQuoteFile(QuoteFileUploadFormRequest $request)
	{
		$file = $request->file('upload');
		$command = new QuoteFileUploadCommand($file);
		$path = $this->commandBus->execute($command);

		return response()->json($path);
	}

	/**
	 * @POST("logoupload")
	 * @param ImageUploadFormRequest|AjaxImageUploadFormRequest|Request $request
	 * @return mixed
	 */
	public function storeLogoImageUploads(ImageUploadFormRequest $request)
	{
		$file = $request->file('upload');
		$command = new LogoImageUploadCommand($file);
		$path = $this->commandBus->execute($command);

		return response()->json($path);
	}

	/**
	 * @POST("printimageupload")
	 * @param ImageUploadFormRequest|Request $request
	 * @return mixed
	 */
	public function storePrintImageUpload(ImageUploadFormRequest $request)
	{
		$file = $request->file('upload');
		$command = new PrintImageUploadCommand($file);
		$path = $this->commandBus->execute($command);

		return response()->json($path);
	}

	/**
	 * @POST("printdocupload")
	 * @param Request $request
	 * @return mixed
     */
	public function storePrintDocUpload(DocUploadFormRequest $request)
	{
		$file = $request->file('upload');
		$command = new PrintDocUploadCommand($file);
		$path = $this->commandBus->execute($command);

		return response()->json($path);
	}

}
