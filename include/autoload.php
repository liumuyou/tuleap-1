<?php
// @codingStandardsIgnoreFile
// @codeCoverageIgnoreStart
// this is an autogenerated file - do not edit
function autoloadb2d8e706133a142ea54869d11478e092($class) {
    static $classes = null;
    if ($classes === null) {
        $classes = array(
            'testmanagementplugin' => '/testmanagementPlugin.class.php',
            'tuleap\\testmanagement\\admincontroller' => '/TestManagement/AdminController.class.php',
            'tuleap\\testmanagement\\adminpresenter' => '/TestManagement/AdminPresenter.class.php',
            'tuleap\\testmanagement\\agiledashboardpaneinfo' => '/TestManagement/AgileDashboardPaneInfo.class.php',
            'tuleap\\testmanagement\\artifactdao' => '/TestManagement/ArtifactDao.php',
            'tuleap\\testmanagement\\artifactfactory' => '/TestManagement/ArtifactFactory.php',
            'tuleap\\testmanagement\\artifactrightspresenter' => '/TestManagement/ArtifactRightsPresenter.php',
            'tuleap\\testmanagement\\config' => '/TestManagement/Config.class.php',
            'tuleap\\testmanagement\\configconformancevalidator' => '/TestManagement/ConfigConformanceValidator.class.php',
            'tuleap\\testmanagement\\criterion\\isearchonmilestone' => '/TestManagement/Criterion/ISearchOnMilestone.php',
            'tuleap\\testmanagement\\criterion\\isearchonstatus' => '/TestManagement/Criterion/ISearchOnStatus.php',
            'tuleap\\testmanagement\\criterion\\milestoneall' => '/TestManagement/Criterion/MilestoneAll.php',
            'tuleap\\testmanagement\\criterion\\milestonefilter' => '/TestManagement/Criterion/MilestoneFilter.php',
            'tuleap\\testmanagement\\criterion\\statusall' => '/TestManagement/Criterion/StatusAll.php',
            'tuleap\\testmanagement\\criterion\\statusclosed' => '/TestManagement/Criterion/StatusClosed.php',
            'tuleap\\testmanagement\\criterion\\statusopen' => '/TestManagement/Criterion/StatusOpen.php',
            'tuleap\\testmanagement\\dao' => '/TestManagement/Dao.class.php',
            'tuleap\\testmanagement\\event\\getitemsfrommilestone' => '/TestManagement/Event/GetItemsFromMilestone.php',
            'tuleap\\testmanagement\\event\\getmilestone' => '/TestManagement/Event/GetMilestone.php',
            'tuleap\\testmanagement\\firstconfigcreator' => '/TestManagement/FirstConfigCreator.class.php',
            'tuleap\\testmanagement\\indexcontroller' => '/TestManagement/IndexController.class.php',
            'tuleap\\testmanagement\\indexpresenter' => '/TestManagement/IndexPresenter.class.php',
            'tuleap\\testmanagement\\labelfieldnotfoundexception' => '/TestManagement/LabelFieldNotFoundException.class.php',
            'tuleap\\testmanagement\\malformedqueryparameterexception' => '/TestManagement/MalformedQueryParameterException.php',
            'tuleap\\testmanagement\\milestoneitemsartifactfactory' => '/TestManagement/REST/MilestoneItemsArtifactFactory.php',
            'tuleap\\testmanagement\\nature\\naturecoveredbyoverrider' => '/TestManagement/Nature/NatureCoveredByOverrider.php',
            'tuleap\\testmanagement\\nature\\naturecoveredbypresenter' => '/TestManagement/Nature/NatureCoveredByPresenter.php',
            'tuleap\\testmanagement\\nocrumb' => '/TestManagement/NoCrumb.php',
            'tuleap\\testmanagement\\paginatedcampaignsrepresentations' => '/TestManagement/REST/v1/PaginatedCampaignsRepresentations.php',
            'tuleap\\testmanagement\\querytocriterionconverter' => '/TestManagement/QueryToCriterionConverter.php',
            'tuleap\\testmanagement\\rest\\resourcesinjector' => '/TestManagement/REST/ResourcesInjector.class.php',
            'tuleap\\testmanagement\\rest\\v1\\artifactnodebuilder' => '/TestManagement/REST/v1/ArtifactNodeBuilder.php',
            'tuleap\\testmanagement\\rest\\v1\\artifactnodedao' => '/TestManagement/REST/v1/ArtifactNodeDao.php',
            'tuleap\\testmanagement\\rest\\v1\\assignedtorepresentationbuilder' => '/TestManagement/REST/v1/AssignedToRepresentationBuilder.php',
            'tuleap\\testmanagement\\rest\\v1\\campaigncreator' => '/TestManagement/REST/v1/CampaignCreator.class.php',
            'tuleap\\testmanagement\\rest\\v1\\campaignrepresentation' => '/TestManagement/REST/v1/CampaignRepresentation.class.php',
            'tuleap\\testmanagement\\rest\\v1\\campaignrepresentationbuilder' => '/TestManagement/REST/v1/CampaignRepresentationBuilder.php',
            'tuleap\\testmanagement\\rest\\v1\\campaignsresource' => '/TestManagement/REST/v1/CampaignsResource.class.php',
            'tuleap\\testmanagement\\rest\\v1\\campaignupdater' => '/TestManagement/REST/v1/CampaignUpdater.class.php',
            'tuleap\\testmanagement\\rest\\v1\\definitionrepresentation' => '/TestManagement/REST/v1/DefinitionRepresentation.php',
            'tuleap\\testmanagement\\rest\\v1\\definitionrepresentationbuilder' => '/TestManagement/REST/v1/DefinitionRepresentationBuilder.php',
            'tuleap\\testmanagement\\rest\\v1\\definitionselector' => '/TestManagement/REST/v1/DefinitionSelector.php',
            'tuleap\\testmanagement\\rest\\v1\\definitionsresource' => '/TestManagement/REST/v1/DefinitionsResource.class.php',
            'tuleap\\testmanagement\\rest\\v1\\executioncreator' => '/TestManagement/REST/v1/ExecutionCreator.class.php',
            'tuleap\\testmanagement\\rest\\v1\\executionrepresentation' => '/TestManagement/REST/v1/ExecutionRepresentation.php',
            'tuleap\\testmanagement\\rest\\v1\\executionrepresentationbuilder' => '/TestManagement/REST/v1/ExecutionRepresentationBuilder.php',
            'tuleap\\testmanagement\\rest\\v1\\executionsresource' => '/TestManagement/REST/v1/ExecutionsResource.class.php',
            'tuleap\\testmanagement\\rest\\v1\\milestonerepresentation' => '/TestManagement/REST/v1/MilestoneRepresentation.class.php',
            'tuleap\\testmanagement\\rest\\v1\\nodebuilderfactory' => '/TestManagement/REST/v1/NodeBuilderFactory.php',
            'tuleap\\testmanagement\\rest\\v1\\nodereferencerepresentation' => '/TestManagement/REST/v1/NodeReferenceRepresentation.php',
            'tuleap\\testmanagement\\rest\\v1\\noderepresentation' => '/TestManagement/REST/v1/NodeRepresentation.php',
            'tuleap\\testmanagement\\rest\\v1\\noderesource' => '/TestManagement/REST/v1/NodesResource.class.php',
            'tuleap\\testmanagement\\rest\\v1\\previousresultrepresentation' => '/TestManagement/REST/v1/PreviousResultRepresentation.php',
            'tuleap\\testmanagement\\rest\\v1\\projectresource' => '/TestManagement/REST/v1/ProjectResource.class.php',
            'tuleap\\testmanagement\\rest\\v1\\slicedexecutionrepresentations' => '/TestManagement/REST/v1/SlicedExecutionRepresentations.php',
            'tuleap\\testmanagement\\router' => '/TestManagement/Router.class.php',
            'tuleap\\testmanagement\\service' => '/TestManagement/Service.class.php',
            'tuleap\\testmanagement\\starttestmanagementcontroller' => '/TestManagement/StartTestManagementController.php',
            'tuleap\\testmanagement\\starttestmanagementpresenter' => '/TestManagement/StartTestManagementPresenter.php',
            'tuleap\\testmanagement\\testmanagementcontroller' => '/TestManagement/TestManagementController.php',
            'tuleap\\testmanagement\\testmanagementplugindescriptor' => '/TestManagement/TestManagementPluginDescriptor.class.php',
            'tuleap\\testmanagement\\testmanagementplugininfo' => '/TestManagement/TestManagementPluginInfo.class.php'
        );
    }
    $cn = strtolower($class);
    if (isset($classes[$cn])) {
        require dirname(__FILE__) . $classes[$cn];
    }
}
spl_autoload_register('autoloadb2d8e706133a142ea54869d11478e092');
// @codeCoverageIgnoreEnd
