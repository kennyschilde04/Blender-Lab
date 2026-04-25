<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/onboarding/submitOnboarding' => [[['_route' => 'POST:onboarding/submitOnboarding', '_controller' => 'App\\Presentation\\Api\\Client\\Integrations\\WordPress\\Controller\\WPOnboardingController::submitOnboarding'], null, ['POST' => 0], ['http' => 0], false, false, null]],
        '/api/onboarding/generateSteps' => [[['_route' => 'POST:onboarding/generateSteps', '_controller' => 'App\\Presentation\\Api\\Client\\Integrations\\WordPress\\Controller\\WPOnboardingController::generateFlowSteps'], null, ['POST' => 0], ['http' => 0], false, false, null]],
        '/api/onboarding/extractAuto' => [[['_route' => 'POST:onboarding/extractAuto', '_controller' => 'App\\Presentation\\Api\\Client\\Integrations\\WordPress\\Controller\\WPOnboardingController::extractAuto'], null, ['POST' => 0], ['http' => 0], false, false, null]],
        '/api/onboarding/submitStepAnswer' => [[['_route' => 'POST:onboarding/submitStepAnswer', '_controller' => 'App\\Presentation\\Api\\Client\\Integrations\\WordPress\\Controller\\WPOnboardingController::submitStepAnswer'], null, ['POST' => 0], ['http' => 0], false, false, null]],
        '/api/onboarding/getStep' => [[['_route' => 'POST:onboarding/getStep', '_controller' => 'App\\Presentation\\Api\\Client\\Integrations\\WordPress\\Controller\\WPOnboardingController::getStepById'], null, ['POST' => 0], ['http' => 0], false, false, null]],
        '/api/onboarding/requirements' => [
            [['_route' => 'GET:onboarding/requirements', '_controller' => 'App\\Presentation\\Api\\Client\\Integrations\\WordPress\\Controller\\WPOnboardingController::getRequirements'], null, ['GET' => 0], ['http' => 0], false, false, null],
            [['_route' => 'POST:onboarding/requirements', '_controller' => 'App\\Presentation\\Api\\Client\\Integrations\\WordPress\\Controller\\WPOnboardingController::createRequirement'], null, ['POST' => 0], ['http' => 0], false, false, null],
        ],
        '/api/onboarding/categories' => [[['_route' => 'GET:onboarding/categories', '_controller' => 'App\\Presentation\\Api\\Client\\Integrations\\WordPress\\Controller\\WPOnboardingController::getCategories'], null, ['GET' => 0], ['http' => 0], false, false, null]],
        '/api/onboarding/location/suggestions' => [[['_route' => 'POST:onboarding/location/suggestions', '_controller' => 'App\\Presentation\\Api\\Client\\Integrations\\WordPress\\Controller\\WPOnboardingController::getLocationSuggestions'], null, ['POST' => 0], ['http' => 0], false, false, null]],
        '/api/pluginInformation' => [[['_route' => 'POST:pluginInformation', '_controller' => 'App\\Presentation\\Api\\Client\\Integrations\\WordPress\\Controller\\WPPluginController::getPluginInformation'], null, ['POST' => 0], ['http' => 0], false, false, null]],
        '/api/documentation/openapi' => [[['_route' => 'documentationRoute', '_controller' => 'App\\Presentation\\Api\\Documentation\\Controller\\ClientDocumentationController::openApi'], null, ['GET' => 0], ['http' => 0], false, false, null]],
        '/api/documentation' => [[['_route' => 'GET:documentation', '_controller' => 'App\\Presentation\\Api\\Documentation\\Controller\\ClientDocumentationController::documentation'], null, ['GET' => 0], ['http' => 0], false, false, null]],
        '/api/integration/status' => [[['_route' => 'POST:integration/status', '_controller' => 'App\\Presentation\\Api\\Public\\Integrations\\WordPress\\Controller\\WPServiceIntegrationController::integrationStatus'], null, ['POST' => 0], ['http' => 0], false, false, null]],
        '/api/sync/keywords' => [[['_route' => 'POST:sync/keywords', '_controller' => 'App\\Presentation\\Api\\Public\\Integrations\\WordPress\\Controller\\WPServiceSyncController::syncKeywords'], null, ['POST' => 0], ['http' => 0], false, false, null]],
        '/api/webhook/ping' => [[['_route' => 'GET:webhook/ping', '_controller' => 'App\\Presentation\\Api\\Public\\Integrations\\WordPress\\Controller\\WPWebhookController::ping'], null, ['GET' => 0], ['http' => 0], false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/api/(?'
                    .'|advancedSettings/(\\d*)(?'
                        .'|(*:40)'
                    .')'
                    .'|metatags/(?'
                        .'|(\\d*)(?'
                            .'|(*:68)'
                        .')'
                        .'|(\\d*)/keyword/swap(*:94)'
                        .'|(\\d*)/title/autoSuggest(*:124)'
                        .'|(\\d*)/description/autoSuggest(*:161)'
                        .'|(\\d*)/keyword(?'
                            .'|(*:185)'
                        .')'
                        .'|(\\d*)/keywords(*:208)'
                        .'|(\\d*)/content/keywords(*:238)'
                        .'|(\\d*)/separator(?'
                            .'|(*:264)'
                        .')'
                    .')'
                    .'|o(?'
                        .'|nboarding/requirements/(\\d*)(*:306)'
                        .'|ptimiser/(?'
                            .'|(\\d*)/data(*:336)'
                            .'|(\\d*)(?'
                                .'|(*:352)'
                            .')'
                        .')'
                    .')'
                    .'|social/(?'
                        .'|(\\d*)(?'
                            .'|(*:381)'
                        .')'
                        .'|(\\d*)/image_sources(*:409)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        40 => [
            [['_route' => 'GET:advancedSettings/{postId}', '_controller' => 'App\\Presentation\\Api\\Client\\Integrations\\WordPress\\Controller\\WPAdvancedSettingsMetaTagsController::getAllAdvancedSettingsMetaTags'], ['postId'], ['GET' => 0], ['http' => 0], false, true, null],
            [['_route' => 'POST:advancedSettings/{postId}', '_controller' => 'App\\Presentation\\Api\\Client\\Integrations\\WordPress\\Controller\\WPAdvancedSettingsMetaTagsController::updateAllAdvancedSettingsMetaTag'], ['postId'], ['POST' => 0], ['http' => 0], false, true, null],
        ],
        68 => [
            [['_route' => 'GET:metatags/{postId}', '_controller' => 'App\\Presentation\\Api\\Client\\Integrations\\WordPress\\Controller\\WPMetaTagsController::getAllMetaTags'], ['postId'], ['GET' => 0], ['http' => 0], false, true, null],
            [['_route' => 'POST:metatags/{postId}', '_controller' => 'App\\Presentation\\Api\\Client\\Integrations\\WordPress\\Controller\\WPMetaTagsController::updateAllMetaTags'], ['postId'], ['POST' => 0], ['http' => 0], false, true, null],
        ],
        94 => [[['_route' => 'POST:metatags/{postId}/keyword/swap', '_controller' => 'App\\Presentation\\Api\\Client\\Integrations\\WordPress\\Controller\\WPMetaTagsController::swapMetaTagsKeywords'], ['postId'], ['POST' => 0], ['http' => 0], false, false, null]],
        124 => [[['_route' => 'POST:metatags/{postId}/title/autoSuggest', '_controller' => 'App\\Presentation\\Api\\Client\\Integrations\\WordPress\\Controller\\WPMetaTagsController::autoSuggestMetaTagsTitle'], ['postId'], ['POST' => 0], ['http' => 0], false, false, null]],
        161 => [[['_route' => 'POST:metatags/{postId}/description/autoSuggest', '_controller' => 'App\\Presentation\\Api\\Client\\Integrations\\WordPress\\Controller\\WPMetaTagsController::autoSuggestMetaTagsDescription'], ['postId'], ['POST' => 0], ['http' => 0], false, false, null]],
        185 => [
            [['_route' => 'PUT:metatags/{postId}/keyword', '_controller' => 'App\\Presentation\\Api\\Client\\Integrations\\WordPress\\Controller\\WPMetaTagsController::addMetaTagsKeyword'], ['postId'], ['PUT' => 0], ['http' => 0], false, false, null],
            [['_route' => 'DELETE:metatags/{postId}/keyword', '_controller' => 'App\\Presentation\\Api\\Client\\Integrations\\WordPress\\Controller\\WPMetaTagsController::removeMetaTagsKeyword'], ['postId'], ['DELETE' => 0], ['http' => 0], false, false, null],
        ],
        208 => [[['_route' => 'GET:metatags/{postId}/keywords', '_controller' => 'App\\Presentation\\Api\\Client\\Integrations\\WordPress\\Controller\\WPMetaTagsController::getKeywords'], ['postId'], ['GET' => 0], ['http' => 0], false, false, null]],
        238 => [[['_route' => 'POST:metatags/{postId}/content/keywords', '_controller' => 'App\\Presentation\\Api\\Client\\Integrations\\WordPress\\Controller\\WPMetaTagsController::getContentKeywords'], ['postId'], ['POST' => 0], ['http' => 0], false, false, null]],
        264 => [
            [['_route' => 'GET:metatags/{postId}/separator', '_controller' => 'App\\Presentation\\Api\\Client\\Integrations\\WordPress\\Controller\\WPMetaTagsController::getPostSeparators'], ['postId'], ['GET' => 0], ['http' => 0], false, false, null],
            [['_route' => 'PUT:metatags/{postId}/separator', '_controller' => 'App\\Presentation\\Api\\Client\\Integrations\\WordPress\\Controller\\WPMetaTagsController::updatePostSeparator'], ['postId'], ['PUT' => 0], ['http' => 0], false, false, null],
        ],
        306 => [[['_route' => 'PUT:onboarding/requirements/{requirementId}', '_controller' => 'App\\Presentation\\Api\\Client\\Integrations\\WordPress\\Controller\\WPOnboardingController::updateRequirement'], ['requirementId'], ['PUT' => 0], ['http' => 0], false, true, null]],
        336 => [[['_route' => 'GET:optimiser/{postId}/data', '_controller' => 'App\\Presentation\\Api\\Client\\Integrations\\WordPress\\Controller\\WPSeoOptimiserController::extractSeoData'], ['postId'], ['GET' => 0], ['http' => 0], false, false, null]],
        352 => [
            [['_route' => 'GET:optimiser/{postId}', '_controller' => 'App\\Presentation\\Api\\Client\\Integrations\\WordPress\\Controller\\WPSeoOptimiserController::retrieveSeoOptimiser'], ['postId'], ['GET' => 0], ['http' => 0], false, true, null],
            [['_route' => 'POST:optimiser/{postId}', '_controller' => 'App\\Presentation\\Api\\Client\\Integrations\\WordPress\\Controller\\WPSeoOptimiserController::proceedSeoOptimiser'], ['postId'], ['POST' => 0], ['http' => 0], false, true, null],
        ],
        381 => [
            [['_route' => 'GET:social/{postId}', '_controller' => 'App\\Presentation\\Api\\Client\\Integrations\\WordPress\\Controller\\WPSocialMetaTagsController::getAllSocialMetaTags'], ['postId'], ['GET' => 0], ['http' => 0], false, true, null],
            [['_route' => 'POST:social/{postId}', '_controller' => 'App\\Presentation\\Api\\Client\\Integrations\\WordPress\\Controller\\WPSocialMetaTagsController::updateAllSocialMetaTag'], ['postId'], ['POST' => 0], ['http' => 0], false, true, null],
        ],
        409 => [
            [['_route' => 'GET:social/{postId}/image_sources', '_controller' => 'App\\Presentation\\Api\\Client\\Integrations\\WordPress\\Controller\\WPSocialMetaTagsController::getSocialImageSources'], ['postId'], ['GET' => 0], ['http' => 0], false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
