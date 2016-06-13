<?php

namespace tesisControl\tesisBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use tesisControl\tesisBundle\Service\JasperReportService\JasperClient;
use tesisControl\tesisBundle\Service\JasperReportService\JasperReportService;

class ReporteController extends Controller
{
	 public function indexAction()
	{
		 $report_format='pdf';
        $jasper_url = "http://localhost:8083/jasperserver";
        $jasper_username = "jasperadmin";
        $jasper_password = "jasperadmin";
        $report_unit = "/Resources/reports/hojaasesoria";
        $report_params = array();

        $client = new Client($jasper_url, $jasper_username, $jasper_password);

        $contentType = (($report_format == 'HTML') ? 'text' : 'application') .
                '/' . strtolower($report_format);

//        $result = $client->requestReport($report_unit, $report_format, $report_params);
        $result = $client->reportService()->runReport($report_unit, $report_format,null,null,null);
        $response = new Response();
        $response->headers->set('Content-Type', $contentType);
        //if (strtoupper($report_format) != 'HTML')
        $response->headers->set('Content-Type', 'application/pdf');
        $response->headers->set('Content-Transfer-Encoding', 'binary');
        $response->headers->set('Content-disposition', 'inline; filename="demo.pdf"');
        $response->setContent($result);

        return $response;
	}
}
