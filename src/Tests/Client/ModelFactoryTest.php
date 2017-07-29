<?php

namespace Activiti\Tests\Client;

use Activiti\Client\Model\Deployment\Deployment;
use Activiti\Client\Model\Deployment\DeploymentList;
use Activiti\Client\Model\Deployment\Resource;
use Activiti\Client\Model\Group\Group;
use Activiti\Client\Model\Group\GroupList;
use Activiti\Client\Model\Group\GroupMember;
use Activiti\Client\Model\IdentityLink;
use Activiti\Client\Model\IdentityLinkList;
use Activiti\Client\Model\Management\Engine;
use Activiti\Client\Model\Management\EngineProperties;
use Activiti\Client\Model\ProcessDefinition\ProcessDefinition;
use Activiti\Client\Model\ProcessDefinition\ProcessDefinitionList;
use Activiti\Client\Model\ProcessInstance\ProcessInstance;
use Activiti\Client\Model\ProcessInstance\ProcessInstanceList;
use Activiti\Client\Model\Task\Attachment;
use Activiti\Client\Model\Task\AttachmentList;
use Activiti\Client\Model\Task\Comment;
use Activiti\Client\Model\Task\CommentList;
use Activiti\Client\Model\Task\Event;
use Activiti\Client\Model\Task\EventList;
use Activiti\Client\Model\Task\Task;
use Activiti\Client\Model\Task\TaskList;
use Activiti\Client\Model\User\User;
use Activiti\Client\Model\User\UserInfo;
use Activiti\Client\Model\User\UserInfoList;
use Activiti\Client\Model\User\UserList;
use Activiti\Client\Model\Variable;
use Activiti\Client\Model\VariableList;
use Activiti\Client\ModelFactory;
use PHPUnit\Framework\TestCase;

class ModelFactoryTest extends TestCase
{
    public function testCreateAttachment()
    {
        $data = $this->getExampleAttachmentData();

        $actual = $this
            ->createModelFactory()
            ->createAttachment($data);

        $this->assertInstanceOf(Attachment::class, $actual);
        $this->assertEquals($data['id'], $actual->getId());
        $this->assertEquals($data['url'], $actual->getUrl());
        $this->assertEquals($data['name'], $actual->getName());
        $this->assertEquals($data['userId'], $actual->getUserId());
        $this->assertEquals($data['description'], $actual->getDescription());
        $this->assertEquals($data['type'], $actual->getType());
        $this->assertEquals($data['taskUrl'], $actual->getTaskUrl());
        $this->assertEquals($data['processInstanceUrl'], $actual->getProcessInstanceUrl());
        $this->assertEquals($data['externalUrl'], $actual->getExternalUrl());
        $this->assertEquals($data['contentUrl'], $actual->getContentUrl());
    }

    public function testCreateAttachmentList()
    {
        $data = $this->getExampleAttachmentListData();

        $actual = $this
            ->createModelFactory()
            ->createAttachmentList($data);

        $this->assertInstanceOf(AttachmentList::class, $actual);
        $this->assertCount(3, $actual);
        $this->assertContainsOnly(Attachment::class, $actual);
    }

    public function testCreateBinaryVariable()
    {
    }

    public function testCreateComment()
    {
        $data = $this->getExampleCommentData();

        $actual = $this
            ->createModelFactory()
            ->createComment($data);

        $this->assertInstanceOf(Comment::class, $actual);
        $this->assertEquals($data['id'], $actual->getId());
        $this->assertEquals($data['author'], $actual->getAuthor());
        $this->assertEquals($data['message'], $actual->getMessage());
        $this->assertEquals($data['time'], $actual->getTime());
        $this->assertEquals($data['taskId'], $actual->getTaskId());
        $this->assertEquals($data['taskUrl'], $actual->getTaskUrl());
        $this->assertEquals($data['processInstanceId'], $actual->getProcessInstanceId());
        $this->assertEquals($data['processInstanceUrl'], $actual->getProcessInstanceUrl());
    }

    public function testCreateCommentList()
    {
        $data = $this->getExampleCommentListData();

        $actual = $this
            ->createModelFactory()
            ->createCommentList($data);

        $this->assertInstanceOf(CommentList::class, $actual);
        $this->assertCount(3, $actual);
        $this->assertContainsOnly(Comment::class, $actual);
    }

    public function testCreateDeployment()
    {
        $data = $this->getExampleDeploymentData();

        $actual = $this->createModelFactory()->createDeployment($data);

        $this->assertInstanceOf(Deployment::class, $actual);
        $this->assertEquals($data['id'], $actual->getId());
        $this->assertEquals($data['name'], $actual->getName());
        $this->assertEquals($data['deploymentTime'], $actual->getDeploymentTime());
        $this->assertEquals($data['category'], $actual->getCategory());
        $this->assertEquals($data['url'], $actual->getUrl());
        $this->assertEquals($data['tenantId'], $actual->getTenantId());
    }

    public function testCreateDeploymentList()
    {
        $data = $this->getExampleDeploymentListData();

        $actual = $this
            ->createModelFactory()
            ->createDeploymentList($data);

        $this->assertInstanceOf(DeploymentList::class, $actual);
        $this->assertEquals($data['total'], $actual->getTotal());
        $this->assertEquals($data['start'], $actual->getStart());
        $this->assertEquals($data['size'], $actual->getSize());
        $this->assertEquals($data['order'], $actual->getOrder());
        $this->assertEquals($data['sort'], $actual->getSort());
        $this->assertCount(3, $actual);
        $this->assertContainsOnly(Deployment::class, $actual);
    }

    public function testCreateEngine()
    {
        $data = $this->getExampleEngineResponse();

        $actual = $this
            ->createModelFactory()
            ->createEngine($data);

        $this->assertInstanceOf(Engine::class, $actual);
        $this->assertEquals($data['name'], $actual->getName());
        $this->assertEquals($data['resourceUrl'], $actual->getResourceUrl());
        $this->assertEquals($data['exception'], $actual->getException());
        $this->assertEquals($data['version'], $actual->getVersion());
    }

    public function testCreateEngineProperties()
    {
        $data = $this->getExampleEngineResponse();

        $actual = $this
            ->createModelFactory()
            ->createEngineProperties($data);

        $this->assertInstanceOf(EngineProperties::class, $actual);
        foreach ($data as $key => $value) {
            $this->assertEquals($value, $actual[$key]);
        }
    }

    public function testCreateEvent()
    {
        $data = $this->getExampleEventData();

        $actual = $this
            ->createModelFactory()
            ->createEvent($data);

        $this->assertInstanceOf(Event::class, $actual);
        $this->assertEquals($data['id'], $actual->getId());
        $this->assertEquals($data['url'], $actual->getUrl());
        $this->assertEquals($data['action'], $actual->getAction());
        $this->assertEquals($data['userId'], $actual->getUserId());
        $this->assertEquals($data['time'], $actual->getTime());
        $this->assertEquals($data['taskUrl'], $actual->getTaskUrl());
        $this->assertEquals($data['processInstanceUrl'], $actual->getProcessInstanceUrl());
        $this->assertEquals($data['message'], $actual->getMessage());
    }

    public function testCreateEventList()
    {
        $data = $this->getExampleEventListData();

        $actual = $this
            ->createModelFactory()
            ->createEventList($data);

        $this->assertInstanceOf(EventList::class, $actual);
        $this->assertCount(3, $actual);
        $this->assertContainsOnly(Event::class, $actual);
    }

    public function testCreateGroup()
    {
        $data = $this->getExampleGroupData();

        $actual = $this
            ->createModelFactory()
            ->createGroup($data);

        $this->assertInstanceOf(Group::class, $actual);
        $this->assertEquals($data['id'], $actual->getId());
        $this->assertEquals($data['url'], $actual->getUrl());
        $this->assertEquals($data['name'], $actual->getName());
        $this->assertEquals($data['type'], $actual->getType());
    }

    public function testCreateGroupList()
    {
        $data = $this->getExampleGroupListData();

        $actual = $this
            ->createModelFactory()
            ->createGroupList($data);

        $this->assertInstanceOf(GroupList::class, $actual);
        $this->assertCount(3, $actual);
        $this->assertContainsOnly(Group::class, $actual);
    }

    public function testCreateGroupMember()
    {
        $data = $this->getExampleGroupMemberData();

        $actual = $this
            ->createModelFactory()
            ->createGroupMember($data);

        $this->assertInstanceOf(GroupMember::class, $actual);
        $this->assertEquals($data['userId'], $actual->getUserId());
        $this->assertEquals($data['groupId'], $actual->getGroupId());
        $this->assertEquals($data['url'], $actual->getUrl());
    }

    public function testCreateIdentityLink()
    {
        $data = $this->getExampleIdentityLinkData();

        $actual = $this
            ->createModelFactory()
            ->createIdentityLink($data);

        $this->assertInstanceOf(IdentityLink::class, $actual);
        $this->assertEquals($data['url'], $actual->getUrl());
        $this->assertEquals($data['user'], $actual->getUser());
        $this->assertEquals($data['group'], $actual->getGroup());
        $this->assertEquals($data['type'], $actual->getType());
    }

    public function testCreateIdentityLinkList()
    {
        $data = $this->getExampleIdentityLinkListData();

        $actual = $this
            ->createModelFactory()
            ->createIdentityLinkList($data);

        $this->assertInstanceOf(IdentityLinkList::class, $actual);
        $this->assertCount(3, $actual);
        $this->assertContainsOnly(IdentityLink::class, $actual);
    }

    public function testCreateProcessDefinition()
    {
        $data = $this->getExampleProcessDefinitionData();

        $actual = $this
            ->createModelFactory()
            ->createProcessDefinition($data);

        $this->assertInstanceOf(ProcessDefinition::class, $actual);
        $this->assertEquals($data['id'], $actual->getId());
        $this->assertEquals($data['url'], $actual->getUrl());
        $this->assertEquals($data['version'], $actual->getVersion());
        $this->assertEquals($data['key'], $actual->getKey());
        $this->assertEquals($data['category'], $actual->getCategory());
        $this->assertEquals($data['suspended'], $actual->getSuspended());
        $this->assertEquals($data['name'], $actual->getName());
        $this->assertEquals($data['description'], $actual->getDescription());
        $this->assertEquals($data['deploymentId'], $actual->getDeploymentId());
        $this->assertEquals($data['deploymentUrl'], $actual->getDeploymentUrl());
        $this->assertEquals($data['graphicalNotationDefined'], $actual->getGraphicalNotationDefined());
        $this->assertEquals($data['resource'], $actual->getResource());
        $this->assertEquals($data['diagramResource'], $actual->getDiagramResource());
        $this->assertEquals($data['startFormDefined'], $actual->getStartFormDefined());
        $this->assertEquals($data['tenantId'], $actual->getTenantId());
    }

    public function testCreateProcessDefinitionList()
    {
        $data = $this->getExampleProcessDefinitionListData();

        $actual = $this
            ->createModelFactory()
            ->createProcessDefinitionList($data);

        $this->assertInstanceOf(ProcessDefinitionList::class, $actual);
        $this->assertEquals($data['total'], $actual->getTotal());
        $this->assertEquals($data['start'], $actual->getStart());
        $this->assertEquals($data['size'], $actual->getSize());
        $this->assertEquals($data['order'], $actual->getOrder());
        $this->assertEquals($data['sort'], $actual->getSort());
        $this->assertCount(3, $actual);
        $this->assertContainsOnly(ProcessDefinition::class, $actual);
    }

    public function testCreateProcessInstance()
    {
        $data = $this->getExampleProcessInstanceData();

        $actual = $this
            ->createModelFactory()
            ->createProcessInstance($data);

        $this->assertInstanceOf(ProcessInstance::class, $actual);
        $this->assertEquals($data['id'], $actual->getId());
        $this->assertEquals($data['url'], $actual->getUrl());
        $this->assertEquals($data['businessKey'], $actual->getBusinessKey());
        $this->assertEquals($data['suspended'], $actual->getSuspended());
        $this->assertEquals($data['ended'], $actual->getEnded());
        $this->assertEquals($data['processDefinitionId'], $actual->getProcessDefinitionId());
        $this->assertEquals($data['processDefinitionUrl'], $actual->getProcessDefinitionUrl());
        $this->assertEquals($data['processDefinitionKey'], $actual->getProcessDefinitionKey());
        $this->assertEquals($data['activityId'], $actual->getActivityId());
        $this->assertContainsOnly(Variable::class, $actual->getVariables());
        $this->assertEquals($data['tenantId'], $actual->getTenantId());
        $this->assertEquals($data['name'], $actual->getName());
        $this->assertEquals($data['completed'], $actual->getCompleted());
    }

    public function testCreateProcessInstanceList()
    {
        $data = $this->getExampleProcessInstanceListData();

        $actual = $this
            ->createModelFactory()
            ->createProcessInstanceList($data);

        $this->assertInstanceOf(ProcessInstanceList::class, $actual);
        $this->assertEquals($data['total'], $actual->getTotal());
        $this->assertEquals($data['start'], $actual->getStart());
        $this->assertEquals($data['size'], $actual->getSize());
        $this->assertEquals($data['order'], $actual->getOrder());
        $this->assertEquals($data['sort'], $actual->getSort());
        $this->assertCount(3, $actual);
        $this->assertContainsOnly(ProcessInstance::class, $actual);
    }

    public function testCreateResource()
    {
        $data = $this->getExampleResourceData();

        $actual = $this
            ->createModelFactory()
            ->createResource($data);

        $this->assertInstanceOf(Resource::class, $actual);
        $this->assertEquals($data['id'], $actual->getId());
        $this->assertEquals($data['url'], $actual->getUrl());
        $this->assertEquals($data['contentUrl'], $actual->getContentUrl());
        $this->assertEquals($data['mediaType'], $actual->getMediaType());
        $this->assertEquals($data['type'], $actual->getType());
    }

    public function testCreateTask()
    {
        $data = $this->getExampleTaskData();

        $actual = $this
            ->createModelFactory()
            ->createTask($data);

        $this->assertInstanceOf(Task::class, $actual);
        $this->assertEquals($data['id'], $actual->getId());
        $this->assertEquals($data['url'], $actual->getUrl());
        $this->assertEquals($data['owner'], $actual->getOwner());
        $this->assertEquals($data['assignee'], $actual->getAssignee());
        $this->assertEquals($data['delegationState'], $actual->getDelegationState());
        $this->assertEquals($data['name'], $actual->getName());
        $this->assertEquals($data['description'], $actual->getDescription());
        $this->assertEquals($data['createTime'], $actual->getCreateTime());
        $this->assertEquals($data['dueDate'], $actual->getDueDate());
        $this->assertEquals($data['priority'], $actual->getPriority());
        $this->assertEquals($data['suspended'], $actual->getSuspended());
        $this->assertEquals($data['taskDefinitionKey'], $actual->getTaskDefinitionKey());
        $this->assertEquals($data['tenantId'], $actual->getTenantId());
        $this->assertEquals($data['category'], $actual->getCategory());
        $this->assertEquals($data['formKey'], $actual->getFormKey());
        $this->assertEquals($data['parentTaskId'], $actual->getParentTaskId());
        $this->assertEquals($data['parentTaskUrl'], $actual->getParentTaskUrl());
        $this->assertEquals($data['executionId'], $actual->getExecutionId());
        $this->assertEquals($data['executionUrl'], $actual->getExecutionUrl());
        $this->assertEquals($data['processInstanceId'], $actual->getProcessInstanceId());
        $this->assertEquals($data['processInstanceUrl'], $actual->getProcessInstanceUrl());
        $this->assertEquals($data['processDefinitionId'], $actual->getProcessDefinitionId());
        $this->assertEquals($data['processDefinitionUrl'], $actual->getProcessDefinitionUrl());
        $this->assertContainsOnly(Variable::class, $actual->getVariables());
    }

    public function testCreateTaskList()
    {
        $data = $this->getExampleTaskListData();

        $actual = $this
            ->createModelFactory()
            ->createTaskList($data);

        $this->assertInstanceOf(TaskList::class, $actual);
        $this->assertEquals($data['total'], $actual->getTotal());
        $this->assertEquals($data['start'], $actual->getStart());
        $this->assertEquals($data['size'], $actual->getSize());
        $this->assertEquals($data['order'], $actual->getOrder());
        $this->assertEquals($data['sort'], $actual->getSort());
        $this->assertCount(3, $actual);
        $this->assertContainsOnly(Task::class, $actual);
    }

    public function testCreateUser()
    {
        $data = $this->getExampleUserData();

        $actual = $this
            ->createModelFactory()
            ->createUser($data);

        $this->assertInstanceOf(User::class, $actual);
        $this->assertEquals($data['id'], $actual->getId());
        $this->assertEquals($data['firstName'], $actual->getFirstName());
        $this->assertEquals($data['lastName'], $actual->getLastName());
        $this->assertEquals($data['url'], $actual->getUrl());
        $this->assertEquals($data['email'], $actual->getEmail());
        $this->assertEquals($data['pictureUrl'], $actual->getPictureUrl());
    }

    public function testCreateUserInfo()
    {
        $data = $this->getExampleUserInfoData();

        $actual = $this
            ->createModelFactory()
            ->createUserInfo($data);

        $this->assertInstanceOf(UserInfo::class, $actual);
        $this->assertEquals($data['key'], $actual->getKey());
        $this->assertEquals($data['value'], $actual->getValue());
        $this->assertEquals($data['url'], $actual->getUrl());
    }

    public function testCreateUserInfoList()
    {
        $data = $this->getExampleUserInfoListData();

        $actual = $this
            ->createModelFactory()
            ->createUserInfoList($data);

        $this->assertInstanceOf(UserInfoList::class, $actual);
        foreach ($data as $key => $value) {
            $this->assertInstanceOf(UserInfo::class, $actual[$key]);
        }
    }

    public function testCreateUserList()
    {
        $data = $this->getExampleUserListData();

        $actual = $this
            ->createModelFactory()
            ->createUserList($data);

        $this->assertInstanceOf(UserList::class, $actual);
        $this->assertEquals($data['total'], $actual->getTotal());
        $this->assertEquals($data['start'], $actual->getStart());
        $this->assertEquals($data['size'], $actual->getSize());
        $this->assertEquals($data['order'], $actual->getOrder());
        $this->assertEquals($data['sort'], $actual->getSort());
        $this->assertCount(3, $actual);
        $this->assertContainsOnly(User::class, $actual);
    }

    public function testCreateVariable()
    {
        $data = $this->getExampleVariableData();

        $actual = $this
            ->createModelFactory()
            ->createVariable($data);

        $this->assertInstanceOf(Variable::class, $actual);
        $this->assertEquals($data['name'], $actual->getName());
        $this->assertEquals($data['type'], $actual->getType());
        $this->assertEquals($data['scope'], $actual->getScope());
        $this->assertEquals($data['value'], $actual->getValue());
        $this->assertEquals($data['valueUrl'], $actual->getValueUrl());
    }

    public function testCreateVariableList()
    {
        $data = $this->getExampleVariableListData();

        $actual = $this
            ->createModelFactory()
            ->createVariableList($data);

        $this->assertInstanceOf(VariableList::class, $actual);
        $this->assertCount(3, $actual);
        $this->assertContainsOnly(Variable::class, $actual);
    }

    private function createModelFactory()
    {
        return new ModelFactory();
    }

    private function getExampleCommentListData()
    {
        return [
            $this->getExampleCommentData(1),
            $this->getExampleCommentData(2),
            $this->getExampleCommentData(3),
        ];
    }

    private function getExampleDeploymentListData()
    {
        return [
            'data' => [
                $this->getExampleDeploymentData(1),
                $this->getExampleDeploymentData(2),
                $this->getExampleDeploymentData(3),
            ],
            'total' => 3,
            'start' => 0,
            'sort' => 'id',
            'order' => 'asc',
            'size' => 25
        ];
    }

    private function getExampleAttachmentData($id = 1)
    {
        return [
            'id' => $id,
            'userId' => 'kermit',
            'url' => 'http://localhost:8182/runtime/tasks/1/attachments',
            'name' => 'Simple attachment',
            'description' => 'Simple attachment description',
            'type' => 'simpleType',
            'taskUrl' => 'http://localhost:8182/runtime/tasks/1',
            'processInstanceUrl' => null,
            'externalUrl' => 'http://activiti.org',
            'contentUrl' => null,
        ];
    }

    private function getExampleAttachmentListData()
    {
        return [
            $this->getExampleAttachmentData(1),
            $this->getExampleAttachmentData(2),
            $this->getExampleAttachmentData(3)
        ];
    }

    private function getExampleCommentData($id = 1)
    {
        return [
            'id' => $id,
            'taskUrl' => 'http://localhost:8081/activiti-rest/service/runtime/tasks/1/comments/' . $id,
            'processInstanceUrl' => 'http://localhost:8081/activiti-rest/service/history/historic-process-instances/1/comments/' . $id,
            'message' => 'This is a comment on the task.',
            'author' => 'kermit',
            'time' => '2014-07-13T13:13:52.232+08:00',
            'taskId' => 1,
            'processInstanceId' => '100',
        ];
    }

    private function getExampleDeploymentData($id = 1)
    {
        return [
            'id' => $id,
            'name' => 'activiti-examples.bar',
            'deploymentTime' => '2010-10-13T14:54:26.750+02:00',
            'category' => 'examples',
            'url' => 'http://localhost:8081/service/repository/deployments/' . $id,
            'tenantId' => 'kermit',
        ];
    }

    private function getExampleEngineResponse()
    {
        return [
            'name' => 'default',
            'version' => '5.15',
            'resourceUrl' => 'file://activiti/activiti.cfg.xml',
            'exception' => null,
        ];
    }

    private function getExampleEventData($id = 1)
    {
        return [
            'action' => 'AddUserLink',
            'id' => $id,
            'message' => [
                'gonzo',
                'contributor',
            ],
            'taskUrl' => 'http://localhost:8182/runtime/tasks/1',
            'time' => '2013-05-17T11:50:50.000+0000',
            'url' => 'http://localhost:8182/runtime/tasks/1/events/1',
            'userId' => 'kermit',
            'processInstanceUrl' => ''
        ];
    }

    private function getExampleGroupData($groupId = 'foo')
    {
        return [
            'id' => $groupId,
            'url' => 'http://localhost:8182/identity/groups/' . $groupId,
            'name' => 'Test group',
            'type' => 'Test type',
        ];
    }

    private function getExampleGroupMemberData($userId = 'kermit', $groupId = 'sales')
    {
        return [
            'userId' => $userId,
            'groupId' => $groupId,
            'url' => 'http://localhost:8182/identity/groups/' . $groupId . '/members/' . $userId,
        ];
    }

    private function getExampleIdentityLinkData($user = 'john', $group = null, $type = 'customType')
    {
        return [
            'url' => 'http://localhost:8182/runtime/.../identitylinks/' . ($user ? ('users/' . $user) : ('groups/' . $group)) . '/' . $type,
            'user' => $user,
            'group' => $group,
            'type' => $type,
        ];
    }

    private function getExampleEventListData()
    {
        return [
            $this->getExampleEventData(1),
            $this->getExampleEventData(2),
            $this->getExampleEventData(3),
        ];
    }

    private function getExampleGroupListData()
    {
        return [
            'data' => [
                $this->getExampleGroupData('foo'),
                $this->getExampleGroupData('bar'),
                $this->getExampleGroupData('baz'),
            ],
            'total' => 3,
            'start' => 0,
            'sort' => 'id',
            'order' => 'asc',
            'size' => 3,
        ];
    }

    private function getExampleIdentityLinkListData()
    {
        return [
            $this->getExampleIdentityLinkData('admin'),
            $this->getExampleIdentityLinkData(null, 'sales'),
            $this->getExampleIdentityLinkData(null, 'PM'),
        ];
    }

    private function getExampleProcessDefinitionData($id = 'foo')
    {
        return [
            'id' => $id . ':1:1',
            'url' => 'http://localhost:8182/repository/process-definitions/' . $id . '%3A1%3A1',
            'version' => 1,
            'key' => 'oneTaskProcess',
            'category' => 'Examples',
            'suspended' => false,
            'name' => 'The One Task Process',
            'description' => 'This is a process for testing purposes',
            'deploymentId' => '2',
            'deploymentUrl' => 'http://localhost:8081/repository/deployments/2',
            'graphicalNotationDefined' => true,
            'resource' => 'http://localhost:8182/repository/deployments/2/resources/testProcess.xml',
            'diagramResource' => 'http://localhost:8182/repository/deployments/2/resources/testProcess.png',
            'startFormDefined' => false,
            'tenantId' => null
        ];
    }

    private function getExampleProcessDefinitionListData()
    {
        return [
            'data' => [
                $this->getExampleProcessDefinitionData('foo'),
                $this->getExampleProcessDefinitionData('bar'),
                $this->getExampleProcessDefinitionData('baz'),
            ],
            'total' => 3,
            'start' => 0,
            'sort' => 'id',
            'order' => 'asc',
            'size' => 3,
        ];
    }

    private function getExampleProcessInstanceData($processInstanceId = 1)
    {
        return [
            'id' => $processInstanceId,
            'url' => 'http://localhost:8182/runtime/process-instances/' . $processInstanceId,
            'businessKey' => 'myBusinessKey',
            'suspended' => false,
            'ended' => false,
            'processDefinitionId' => 'processOne:1:4',
            'processDefinitionUrl' => 'http://localhost:8182/repository/process-definitions/processOne%3A1%3A4',
            'processDefinitionKey' => 'processOne',
            'activityId' => 'processTask',
            'variables' => [
                $this->getExampleVariableData('foo', 'string', 'Foo'),
                $this->getExampleVariableData('bar', 'string', 'Bar'),
                $this->getExampleVariableData('baz', 'string', 'Baz'),
            ],
            'tenantId' => null,
            'name' => '',
            'completed' => false
        ];
    }

    private function getExampleProcessInstanceListData()
    {
        return [
            'data' => [
                $this->getExampleProcessInstanceData(1),
                $this->getExampleProcessInstanceData(2),
                $this->getExampleProcessInstanceData(3),
            ],
            'total' => 3,
            'start' => 0,
            'sort' => 'id',
            'order' => 'asc',
            'size' => 3,
        ];
    }

    private function getExampleResourceData()
    {
        return [
            'id' => 'diagrams/my-process.bpmn20.xml',
            'url' => 'http://localhost:8081/activiti-rest/service/repository/deployments/10/resources/diagrams%2Fmy-process.bpmn20.xml',
            'contentUrl' => 'http://localhost:8081/activiti-rest/service/repository/deployments/10/resourcedata/diagrams%2Fmy-process.bpmn20.xml',
            'mediaType' => 'text/xml',
            'type' => 'processDefinition',
        ];
    }

    private function getExampleTaskData($id = 1)
    {
        return [
            'id' => $id,
            'url' => 'http://localhost:8080/activiti-rest/service/runtime/tasks/' . $id,
            'owner' => null,
            'assignee' => null,
            'delegationState' => null,
            'name' => 'Handle escalated issue',
            'description' => 'Escalation: issue was not fixed in time by first level support',
            'createTime' => '2017-06-18T13:29:44.019+02:00',
            'dueDate' => null,
            'priority' => 50,
            'suspended' => false,
            'taskDefinitionKey' => 'handleEscalation',
            'tenantId' => '',
            'category' => null,
            'formKey' => null,
            'parentTaskId' => null,
            'parentTaskUrl' => null,
            'executionId' => '7508',
            'executionUrl' => 'http://localhost:8080/activiti-rest/service/runtime/executions/7508',
            'processInstanceId' => '7501',
            'processInstanceUrl' => 'http://localhost:8080/activiti-rest/service/runtime/process-instances/7501',
            'processDefinitionId' => 'escalationExample:6:5006',
            'processDefinitionUrl' => 'http://localhost:8080/activiti-rest/service/repository/process-definitions/escalationExample:6:5006',
            'variables' => [
                $this->getExampleVariableData('foo', 'string', 'Foo'),
                $this->getExampleVariableData('bar', 'string', 'Bar'),
                $this->getExampleVariableData('baz', 'string', 'Baz'),
            ],
        ];
    }

    private function getExampleTaskListData()
    {
        return [
            'data' => [
                $this->getExampleTaskData(1),
                $this->getExampleTaskData(2),
                $this->getExampleTaskData(3),
            ],
            'total' => 3,
            'start' => 0,
            'sort' => 'id',
            'order' => 'asc',
            'size' => 3,
        ];
    }

    private function getExampleUserData($userId = 'kermit')
    {
        return [
            'id' => $userId,
            'firstName' => 'Fred',
            'lastName' => 'McDonald',
            'url' => 'http://localhost:8182/identity/users/' . $userId,
            'email' => 'no-reply@activiti.org',
            'pictureUrl' => null
        ];
    }

    private function getExampleUserInfoData($key = 'foo', $value = 'bar', $userId = 'kermit')
    {
        return [
            'key' => $key,
            'value' => $value,
            'url' => 'http://localhost:8182/identity/users/' . $userId . '/info/' . $key,
        ];
    }

    private function getExampleUserInfoListData()
    {
        return [
            $this->getExampleUserInfoData('foo', 'Foo'),
            $this->getExampleUserInfoData('bar', 'Bar'),
            $this->getExampleUserInfoData('baz', 'Baz'),
        ];
    }

    private function getExampleUserListData()
    {
        return [
            'data' => [
                $this->getExampleUserData('kermit'),
                $this->getExampleUserData('pigi'),
                $this->getExampleUserData('cookie_monster'),
            ],
            'total' => 3,
            'start' => 0,
            'sort' => 'id',
            'order' => 'asc',
            'size' => 3,
        ];
    }

    private function getExampleVariableData($name = 'intProceVar', $type = 'integer', $value = 123, $valueUrl = null, $scope = 'local')
    {
        return [
            'name' => $name,
            'type' => $type,
            'value' => $value,
            'valueUrl' => $valueUrl,
            'scope' => $scope,
        ];
    }

    private function getExampleVariableListData()
    {
        return [
            $this->getExampleVariableData('number'),
            $this->getExampleVariableData('file', '', null, 'http://localhost:8182/.../variables/file/data'),
            $this->getExampleVariableData('string', 'string', 'Lorem ipsum dolor...')
        ];
    }
}
