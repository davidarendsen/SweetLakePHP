<?php

namespace SWP\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class EventController extends Controller
{
    /**
     * @Route("/event/{id}", name="event.show")
     * @Template()
     */
    public function meetupAction($id)
    {
        $meetupService = $this->get('swp_frontend.meetupService');

        $meetupService->getUpcomingEvents();

        if ($event = $meetupService->find($id)) {
            return array(
                'event' => $event
            );
        }

        throw new \Exception("Meetup not found", 404);
    }
}